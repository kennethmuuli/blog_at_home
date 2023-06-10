<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required',
            'password' => 'required'

        ]);

        if (! auth()->attempt($attributes))
        {
            throw ValidationException::withMessages(['email' => 'Your provided ceredentials could not be verified.']);
        }

        session()->regenerate();
        return redirect('/')->with('success', 'Logged In');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
