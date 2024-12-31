<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function store(Request $request)
    {
        //return view('auth.register');
         if ($request->isMethod('get')) {
            return view('auth.register');
        }

        // Validation of input data when the form is submitted
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'name.required' => 'Jméno je povinné.',
            'email.required' => 'Email je povinný.',
            'email.email' => 'Zadaný email není platný.',
            'email.unique' => 'Tento email je již registrován.',
            'password.required' => 'Heslo je povinné.',
            'password.min' => 'Heslo musí mít alespoň 8 znaků.',
            'password.confirmed' => 'Hesla se neshodují.',
        ]);

        // Create new user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Login the user after registration
        Auth::login($user);

        // Redirect the user to the dashboard after successful registration
        return redirect()->route('home')->with('success', 'Registrace proběhla úspěšně!');
    }

        public function index()
    {
        return view('auth.login'); // Show the login form
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
        return redirect()->intended('home');
    }

    return back()->withErrors([
        'email' => 'Zadaný email není registrován.',
        'password' => 'Zadané heslo není správné.',
        ])->onlyInput('email');
    }

}