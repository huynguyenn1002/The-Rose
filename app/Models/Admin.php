<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable 
{
    use HasFactory;
    
    public $timestamps = true;
    
    protected $fillable = [
        'firstname', 
        'lastname', 
        'mail_address',
        'tel',
        'avatar',
        'district_id',
        'province_id',
        'ward_id',
        'district_name',
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

}
