<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function login(User $user)
    {
        auth()->login($user);
    }

    public function loginWithCredentials(array $credentials)
    {
        return auth()->attempt($credentials);
    }

    public function logout()
    {
        auth()->logout();
    }

    public function registrationParams()
    {
        return ['name', 'email', 'password'];
    }

    public function authenticationParams()
    {
        return ['email', 'password'];
    }

    public function registrationValidation()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }
}
