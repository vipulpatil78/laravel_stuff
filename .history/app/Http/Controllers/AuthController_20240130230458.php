<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function register() {
        return view('auth.register');
    }

    public function createUser(Request $request) {

        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->firstname . " " . $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('status', 'Registered Success!');
    }

    public function login() {
        return view('auth.login');
    }

    public function loginAuthenticate(Request $request) {
        $creds = [
            'email' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($creds)) {
            return redirect('/products', 'Sign-in Successfully!');
        }

        return back()->with('error', 'Invalid Credentials');
    }
}
