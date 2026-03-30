<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name;
    public $phone;
    public $email;
    public $password;
    public $password_confirmation;
    public $showPassword = false;
    public $showPasswordConf = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function togglePassword()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function toggleConfirmPassword()
    {
        $this->showPasswordConf = !$this->showPasswordConf;
    }

    public function register()
    {
        $validated = $this->validate();

        $user = User::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'customer',
        ]);

        // Auto login after registration
        Auth::login($user);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
