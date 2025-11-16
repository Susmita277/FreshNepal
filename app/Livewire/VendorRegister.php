<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VendorRegister extends Component
{
    public $name;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;
    public $showPassword = false;
    public $showConfirmPassword = false;

    protected $rules = [
        'name' => 'required|min:2|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|unique:users,phone',
        'password' => 'required|min:8|confirmed',
    ];

    protected $messages = [
        'name.required' => 'The store name field is required.',
        'name.min' => 'The store must be at least 2 characters.',
        'email.required' => 'The email field is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email is already registered.',
        'phone.required' => 'The phone number is required.',
        'phone.unique' => 'This phone number is already registered.',
        'password.required' => 'The password field is required.',
        'password.min' => 'The password must be at least 8 characters.',
        'password.confirmed' => 'The passwords do not match.',
    ];

    public function mount()
    {
        if (!session()->has('vendor_otp')) {
            return redirect()->route('seller-verify');
        }
    }

    // Toggle password visibility
    public function togglePassword()
    {
        $this->showPassword = !$this->showPassword;
    }

    // Toggle confirm password visibility
    public function toggleConfirmPassword()
    {
        $this->showConfirmPassword = !$this->showConfirmPassword;
    }

  public function registerVendor()
{
    $this->validate();

    try {
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'role' => 'vendor'
        ]);

        // Login
        Auth::login($user);
        
        // FORCE session save before redirect
        session()->save();

        return redirect('/vendor');
         
    } catch (\Exception $e) {
        session()->flash('error', 'Registration failed: ' . $e->getMessage());
    }
}

    public function render()
    {
        return view('livewire.vendor-register');
    }
}
