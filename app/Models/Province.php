<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = "province";
    protected $primaryKey = ('province_id, city_id');

    protected $fillable = [
        'city_id',
        'name',
        'province_id'
    ];
}
