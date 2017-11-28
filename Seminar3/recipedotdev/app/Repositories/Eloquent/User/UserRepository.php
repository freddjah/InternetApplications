<?php

namespace App\Repositories\Eloquent\User;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    function getAll()
    {
        return $this->user->all();
    }

    function getById($id)
    {
        return $this->user->where('id', $id)->first();
    }

    function create(array $attributes)
    {
        return $this->user->create($attributes);
    }

    function update($id, array $attributes)
    {
        return $this->user->where('id', $id)->update($attributes);
    }

    function delete($id)
    {
        $this->user->where('id', $id)->delete();
    }

    public function logout()
    {
        $this->user->logout();
    }

    public function login(User $user)
    {
        $this->user->login($user);
    }

    public function loginWithCredentials(array $credentials)
    {
        $this->user->loginWithCredentials($credentials);
    }

    public function getRegistrationParams()
    {
        return $this->user->registrationParams();
    }

    public function getAuthenticationParams()
    {
        return $this->user->authenticationParams();
    }

    public function getRegistrationValidation()
    {
        return $this->user->registrationValidation();
    }
}