<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;

class AuthController extends Controller
{
    // Show all bookings
    public function showLogin()
    {
        return view('auth.login'); // your slider page
    }

    // Handle login logic
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Check if the email is in the 'admins' table first
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended(route('services.index')); // Redirect to admin dashboard
        }

        // If not, check the 'users' table
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended(route('booking2')); // Redirect to user booking page
        }

        // If neither attempt works, show an error
        return back()->withErrors(['login_error' => 'Invalid email or password'])->withInput();
    }

    // Handle registration logic
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed', // password_confirmation field required in the form
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('auth/login')->with('success', 'Account created. Please login.');
    }




    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home2'); // Redirect to the login page after logging out
    }
}

