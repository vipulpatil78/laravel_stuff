<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function index() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function createUser() {
        User $user = new User();
    }
}
