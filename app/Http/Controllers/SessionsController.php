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

        if (auth()->attempt($attributes))
        {
            session()->regenerate();
            // Above against sessions fixation attacks
            return redirect('/')->with('success', 'Logged In');
        }

        // Method 2
        throw ValidationException::withMessages(['email' => 'Your provided ceredentials could not be verified.']);

        // //  Method 1
        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Your provided ceredentials could not be verified.']);
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
