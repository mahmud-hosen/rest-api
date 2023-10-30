<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Tymon\JWTAuth\Contracts\JWTSubject;  // Add this for jwt

class User extends Authenticatable implements JWTSubject // Add implements JWTSubject for jwt
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Add getJWTIdentifier for jwt
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // Add getJWTCustomClaims for jwt

    public function getJWTCustomClaims()
    {
        return [];
    }
}
