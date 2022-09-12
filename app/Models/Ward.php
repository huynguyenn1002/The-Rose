<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = "ward";
    protected $primaryKey = ('ward_id, province_id');

    protected $fillable = [
        'ward_id',
        'name',
        'province_id'
    ];
}