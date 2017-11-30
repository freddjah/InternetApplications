<?php

namespace App\Http\Controllers;

use App\User;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function show()
    {
        return view('auth.login');
    }

    public function store()
    {
        $authParams = User::authenticationParams();
        $userCredentials = request($authParams);

        $loggedIn = User::loginWithCredentials($userCredentials);

        if (!$loggedIn) {
            return back()->withErrors([
                'message' => 'Whoops! We couldn\'t sign you in. Please make sure that you\'ve entered the correct email-adress and password'
            ]);
        }
    }

    public function destroy()
    {
        User::logout();
        return redirect(route('home'));
    }

}
