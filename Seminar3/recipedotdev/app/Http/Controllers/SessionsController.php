<?php

namespace App\Http\Controllers;


use App\Repositories\Contracts\UserRepositoryInterface;

class SessionsController extends Controller
{
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $authParams = $this->repository->getAuthenticationParams();
        $credentials = request($authParams);

        if ($this->repository->loginWithCredentials($credentials)) {
            return back()->withErrors([
                'message' => 'Please check that your credentials are correct and try again.'
            ]);
        }

        return redirect('/');
    }

    public function destroy()
    {
        $this->repository->logout();
        return redirect('/');
    }

}
