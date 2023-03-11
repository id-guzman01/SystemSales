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

        if($this->remember==1){
            $remember  = true;
        }else{
            $remember  = false; 
        }

        $user = User::where('email','=',$this->email)->first();
   
        if( isset($user->id) ){

            if(Hash::check($this->password,$user->password)){

                $credentials = [
                    'email' => $this->email,
                    'password' => $this->password
                ];
        
                if(Auth::attempt($credentials, $remember)){
                    return redirect()->to('admin/dashboard');
                }else{
                    session()->flash('message', 'proceso fallido');
                }

            }else{
                session()->flash('message', 'password erronea');
            }

        }else{
            session()->flash('message', 'email erroneo');
        }


    }


}
