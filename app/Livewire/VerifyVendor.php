<?php

namespace App\Livewire;

use Livewire\Component;
use App\Mail\VendorOtpMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class VerifyVendor extends Component
{
    public $email;
    public $otp = ['', '', '', '', '', ''];
    public $generatedOtp;
    public $otpSent = false;
    public $timer = 0;
    public $canResend = false;
    public $isSending = false;
    public $isVerifying = false;
    public $errorMessage = '';

    protected $rules = [
        'email' => 'required|email',
    ];

    public function mount()
    {
        $this->timer = 0;
        session()->regenerate();
    }

    public function sendOtp()
    {
        $this->validate();
        $this->isSending = true;
        $this->errorMessage = '';

        try {
            // Check if user already exists with this email
            $existingUser = User::where('email', $this->email)->first();

            if ($existingUser) {
                $this->errorMessage = 'User already exists!';
                $this->isSending = false;
                return;
            }

            $this->generatedOtp = rand(100000, 999999);
            session([
                'vendor_otp' => $this->generatedOtp,
                'vendor_email' => $this->email
            ]);

            Mail::to($this->email)->send(new VendorOtpMail($this->generatedOtp));

            $this->otpSent = true;
            $this->timer = 60;
            $this->canResend = false;
            $this->isSending = false;

            $this->dispatch('start-timer');
        } catch (\Exception $e) {
            $this->isSending = false;
            $this->errorMessage = 'Failed to send OTP: ' . $e->getMessage();
        }
    }

    public function verifyOtp()
    {
        $this->isVerifying = true;
        $enteredOtp = implode('', $this->otp);

        // Validate OTP length
        if (strlen($enteredOtp) !== 6) {
            $this->errorMessage = 'Please enter a complete 6-digit OTP code.';
            $this->isVerifying = false;
            return;
        }

        if (session('vendor_otp') == $enteredOtp && session('vendor_email') == $this->email) {
            session()->flash('success', 'OTP verified successfully!');
            $this->isVerifying = false;
            return redirect()->route('seller-register');
        } else {
            $this->errorMessage = 'Invalid OTP! Please try again.';
            // Clear the OTP fields on error
            $this->otp = ['', '', '', '', '', ''];
            $this->isVerifying = false;
        }
    }

    public function resendOtp()
    {
        if ($this->timer === 0) {
            $this->sendOtp();
        }
    }

    public function decrementTimer()
    {
        if ($this->timer > 0) {
            $this->timer--;

            if ($this->timer === 0) {
                $this->canResend = true;
            }
        }
    }

    // Fixed updatedOtp method
    public function updatedOtp($value, $key)
    {
        // Check if key contains a dot (like "otp.0")
        if (str_contains($key, '.')) {
            $parts = explode('.', $key);
            if (count($parts) === 2) {
                $index = (int)$parts[1];

                // Auto-focus next input
                if ($value !== '' && $index < 5) {
                    $this->dispatch('focus-next', index: $index + 1);
                }

                // Auto-verify when last digit is entered
                if ($index === 5 && $value !== '') {
                    // Small delay to ensure the value is updated
                    $this->dispatch('auto-verify');
                }
            }
        }
    }

   
    public function render()
    {
        return view('livewire.verify-vendor');
            
    }
}
