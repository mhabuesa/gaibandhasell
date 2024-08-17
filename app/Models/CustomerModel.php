<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CustomerModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $guard = 'customer';



    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
