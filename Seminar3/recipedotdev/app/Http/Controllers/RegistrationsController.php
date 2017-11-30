<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationsController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    /**
     * This method validates the given input, creates a new user and logs the user in, then it redirects the user to the home page.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        // Validate form
        $validator = User::registrationValidation();
        $this->validate(request(), $validator);

        // Register user
        $registrationParams = User::registrationParams();
        $user = User::create(request($registrationParams));

        // Log in user
        User::loginUser($user);

        // Redirect to home page
        return redirect('/');
    }
}
