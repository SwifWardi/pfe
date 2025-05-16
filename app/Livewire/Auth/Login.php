<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password, $remember_me = false;
    public $errorMessage;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ], $this->remember_me)) {
            $this->dispatch('showToast', ['type' => 'success', 'message' => 'Logged in successfully!']);
            if(auth()->user()->hasRole('admin')) return redirect('/admin');
            elseif(auth()->user()->hasRole('vendor')) return redirect('/vendor');

            return redirect('/');
        }
        $this->dispatch('showToast', ['type' => 'error', 'message' => 'Invalid email or password']);
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
