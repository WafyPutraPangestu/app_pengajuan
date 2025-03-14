<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
        }

        if (Auth::user()->role === 'admin') {
            return redirect()->intended('/admin/input');
        }
        return redirect()->intended('/');

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');      
    }
  
  

    /**
     * Display the specified resource.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'numeric'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = User::create($credentials);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

 
}
