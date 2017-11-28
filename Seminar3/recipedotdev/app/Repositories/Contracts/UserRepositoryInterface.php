<?php

namespace App\Repositories\Contracts;

use App\User;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function logout();
    public function login(User $user);
    public function loginWithCredentials(array $credentials);
    public function getRegistrationParams();
    public function getAuthenticationParams();
    public function getRegistrationValidation();
}