<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'uuid',
        'password',
        'address',
        'region',
        'city',
        'postcode',
        'country',
        'phone',
        'birthday',
        'gender',
        'isAdmin',
        'status'
    ];
}
