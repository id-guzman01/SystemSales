<?php

namespace App\Http\Livewire\Auth\Login;

use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{

    public $email, $password, $remember;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8'
    ];

    public function render(){
        return view('livewire.auth.login.login');
    }

    public function login(){

        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if(Auth::attempt($credentials)){
            
        }else{
            
        }


    }


}
