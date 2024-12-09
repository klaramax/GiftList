<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;


class AuthController extends Controller
{
     public function index(Request $request)
    {
        if ($request->getRequestUri() === '/login') {

            return view('auth.login');
        }

        if ($request->getRequestUri() === '/register') {
            return view('auth.register');
        }
    abort(404);
    }


    // Handle the login request, validate credentials, and attempt to log in the user
    public function authenticate(Request $request): RedirectResponse
    {
        $messages = [
        'email.required' => 'Zadejte prosím email.',
        'email.email' => 'Zadaný email není platný.',
        'password.required' => 'Vyplňte vaše heslo.',
    ];

    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ], $messages);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('dashboard');
    }

    return back()->withErrors([
        'email' => 'Zadaný email není registrován.',
        'password' => 'Zadané heslo není správné.',
    ])->onlyInput('email');
}

    // Handle the registration request, validate input, and create a new user
    public function store(Request $request)
    {
        // Validate the input data
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',  // Ensure the email is unique in the users table
            'password' => 'required|min:8|confirmed',  // Password confirmation is mandatory
        ]);

        // Create new user if validation passed
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);  // Hash the password
        $user->save();  // Save the new user to the database

        // Login the user after registration
        Auth::login($user);

        // Redirect the user to the dashboard after successful registration
        return redirect()->route('dashboard');
    }
}