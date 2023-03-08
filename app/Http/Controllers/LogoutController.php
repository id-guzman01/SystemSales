<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogoutController extends Controller
{
    
    public function logout(){

        $state = Auth::logout();

        if($state){
            return view('login');
        }


    }

}
