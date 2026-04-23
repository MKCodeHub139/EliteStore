<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $validated = $request->validate(([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]));
        $createdUser = User::create($validated);
        if($createdUser){
            return redirect()->route('login')->with('success', 'Registration successful. Please login.');
        }else{
            return back()->with('error', 'Registration failed. Please try again.');
}
    }
    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if(auth()->guard('web')->attempt($validated)){
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success', 'Login successful.');
        }else{
            return back()->with('error', 'Invalid credentials.');
        }
    }
}
