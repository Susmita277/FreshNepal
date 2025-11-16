<?php


namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;
    public $showPassword = false;

    public function login()
    {
        $credentials = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard'); // your Filament or custom admin route
            } elseif ($user->role === 'vendor') {
                return redirect()->route('vendor.dashboard'); // your vendor dashboard
            } else {
                return redirect()->route('home'); // customer home page
            }
        }

        session()->flash('error', 'Invalid credentials');
    }

    // Toggle password visibility
    public function togglePassword()
    {
        $this->showPassword = !$this->showPassword;
    }

  

    public function render()
    {
        return view('livewire.login');
    }
}
