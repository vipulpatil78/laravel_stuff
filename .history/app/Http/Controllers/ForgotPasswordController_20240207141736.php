<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function forgotPassword() : View {
        view('forgot-password');
    }
}
