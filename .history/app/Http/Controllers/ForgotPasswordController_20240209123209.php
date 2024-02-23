<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function forgotPassword() : View {
        return view('auth.forgot-password');
    }

    public function forgotPasswordPost(Request $request) : RedirectResponse {
        $request->validate([
            'email' => 'required|email|exists::users',
        ]);
        $token = Str::random(64);
    } 
}
