<?php

namespace festochshop\auth\domaine\entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'email',
        'password',
        'active',
        'activation_token',
        'activation_token_date',
        'refresh_token',
        'refresh_token_expiration_date',
        'reset_passwd_token',
        'reset_passwd_token_expiration_date',
        'username'
    ];

    protected $table = 'user';
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    public $timestamps = false;
}