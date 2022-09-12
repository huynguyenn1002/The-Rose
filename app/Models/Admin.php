<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable 
{
    use HasFactory;

    protected $fillable = [
        'firstname', 
        'lastname', 
        'mail_address',
        'tel',
        'avatar',
        'city_id',
        'province_id',
        'ward_id',
        'city_name',
        'province_name',
        'ward_name',
        'address',
        'password',
        'password_confirm'
    ];

    protected $hidden = [
        'password', 'remember_token', 'password_confirm'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public $timestamps = false;
}
