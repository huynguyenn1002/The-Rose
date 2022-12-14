<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "category";
    public $timestamps = true;

    protected $fillable = [
        'id', 
        'name', 
        'description',
        'updated_at',
        'created_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
