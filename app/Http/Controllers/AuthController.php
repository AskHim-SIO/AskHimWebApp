<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function ViewLogin(){
        return View('Auth/login');
    }

    public function ViewRegister(){
        return View('Auth/register');
    }
}
