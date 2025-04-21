<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
 
 
class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }
 
 
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
 
 
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
 
 
        return redirect('/login')->with('success', 'Registered successfully. Please login.');
    }
 
 
    public function showLogin() {
        return view('auth.login');
    }
 
 
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
 
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect to the dashboard after successful login
            return redirect()->route('posts.index')->with('success', 'Welcome back!');
        }
 
 
        // Redirect back with an error if login fails
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }
 
 
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}