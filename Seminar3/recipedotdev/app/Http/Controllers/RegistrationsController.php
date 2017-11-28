<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class RegistrationsController extends Controller
{
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create()
    {
        return view('registration.create');
    }

    /**
     * Store
     *
     * This method validates the given input, creates a new user and logs the user in, then it redirects the user to the home page.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        // Validate form
        $validator = $this->repository->getRegistrationValidation();
        $this->validate(request(), $validator);

        // Register user
        $registrationParams = $this->repository->getRegistrationParams();
        $user = $this->repository->create(request($registrationParams));

        // Log in user
        $this->repository->login($user);

        // Redirect to home page
        return redirect('/');
    }
}
