<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('emails.forgot-password', ['token' => $token], function($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->to(route('forgotpassword'))->with('sucess', 'Password Reset Link sent to your email-id');
    }

    public function resetPassword() {
        
    }

    public function resetPasswordPost() {

    }
}
