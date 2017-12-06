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

    /**
     * Default action to encrypt password when creating a new User
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Setting up relationship with Comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Logging in a user with credentials.
     *
     * @param $userCredentials
     */
    public static function loginWithCredentials($userCredentials)
    {
        auth()->attempt($userCredentials);
    }

    /**
     * Logging in a user with a user-object.
     *
     * @param User $user
     */
    public static function loginUser(User $user)
    {
        auth()->login($user);
    }

    /**
     * Logging out current user user.
     */
    public static function logout()
    {
        auth()->logout();
    }

    /**
     * Defining parameters to use when creating a new User
     *
     * @return array
     */
    public static function registrationParams()
    {
        return ['name', 'email', 'password'];
    }

    /**
     * Defining parameters needed to authenticate a User
     *
     * @return array
     */
    public static function authenticationParams()
    {
        return ['email', 'password'];
    }

    /**
     * Defining the validations to be made before a User can be created.
     *
     * @return array
     */
    public static function registrationValidation()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }
}
