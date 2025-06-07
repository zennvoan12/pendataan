<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    // public function authenticate(Request $request)
    // {
    //     // Validate the request data
    //     $credentials = $request->validate([
    //         'username' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     // Attempt to log in the user
    //     if (Auth::attempt($credentials)) {
    //         // Regenerate session to prevent session fixation attacks
    //         $request->session()->regenerate();

    //         // Redirect to the intended page or home
    //         return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
    //     }

    //     // If authentication fails, redirect back with an error message
    //     return back()->withErrors([
    //         'username' => 'The provided credentials do not match our records.'
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function authenticate(Request $request)
    {
        // Validasi hanya 1 field: login (bisa username/email), dan password
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string'
        ]);

        // Deteksi apakah input email atau username
        $login_type = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Susun kredensial sesuai tipe login
        $credentials = [
            $login_type => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
        }

        // Jika gagal
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.'
        ])->onlyInput('login');
    }




    public function create()
    {
        return view('login.create', [
            'title' => 'Register'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // Hash the password
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Create the user
        User::create($validatedData);

        // Redirect to login with success message
        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
