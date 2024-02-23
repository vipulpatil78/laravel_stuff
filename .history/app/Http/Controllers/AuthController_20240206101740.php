<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
            'email' => 'required|unique:users|email',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->firstname . " " . $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('status', 'Registered Success!');
    }

    public function login() : View {
        return view('auth.login');
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
 
        return redirect('/')->with('success', 'logged out successfully');
    }

    public function loginAuthenticate(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $creds = [
            'email' => $request->username,
            'password' => $request->password,
        ];
        
        if(Auth::attempt($creds)) {
            return redirect('products')->with('success', 'Sign-in Successfully!');
        }

        return back()->with('error', 'Invalid Credentials');
    }
}
