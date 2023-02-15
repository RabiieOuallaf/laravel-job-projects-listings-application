<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // display register page
    public function create() {
        return view('users.register');
    }

    // Store user data 
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['require', 'main:3'],
            'email' => ['require', 'email', Rule::unique('users', 'email')],
            'password' => 'require|confirmed|min:6'
        ]);

        // hash password
        $formFields['password'] = bcrypt($formFields['password']);
        // create user
        $user = User::create($formFields);
        // login 
        auth()->login($user);
        
        return redirect('/')->with('message', 'User created and logged in');

    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have logged out' );
    }
}
