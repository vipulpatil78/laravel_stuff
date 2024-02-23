<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function forgotPassword() : View {
        return view('auth.forgot-password');
    }

    public function forgotPasswordPost(Request $request) : RedirectResponse {
        $request->validate([
            'email' => 'required|email',
        ]);
        $token = Str::random(64);

        $response = $this->broker()->sendResetLink($request->only('email'));


        // DB::table('password_reset_tokens')->insert([
        //     'email' => $request->email,
        //     'token' => $token,
        //     'created_at' => Carbon::now(),
        // ]);

        // Mail::send('emails.forgot-password', ['token' => $token], function($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });

        // return redirect()->to(route('forgotpassword'))->with('sucess', 'Password Reset Link sent to your email-id');
        return $response == Password::RESET_LINK_SENT
                            ? $this->sendResetLinkResponse($response)
                            : $this->sendResetLinkFailedResponse($request, $response);
    }

    protected function sendResetLinkResponse($response) {
        return back()->with('status', trans($response));
    }

    protected function sendResetLinkFailedResponse(Request $request, $response) {
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }

    public function resetPassword(string $token) {
        return view('auth.reset-password', compact(['token' => $token]));
    }

    public function broker() {
        return Password::broker();
    }

    public function resetPasswordPost(Request $request) {
        $request->validate([
            "email" => "required|email|exists:users",
            "password" => "required|string|min:6|confirmed",
            "confirm_password" => "required"
        ]);

        $updatePassword = DB::table('password_reset_tokens')
                        ->where([
                            'email' => $request->email,
                            'token' => $request->token
                        ])->first();

        if (!$updatePassword) {
            return redirect()->to(route('resetpassword'))->with('error', 'Invalid');
        }
        User::where("email", $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_reset_tokens')->where(["email", $request->email])->delete();

        return redirect()->to(route('login.user'))->with('success', 'Password Reset Successful!');
    }
}
