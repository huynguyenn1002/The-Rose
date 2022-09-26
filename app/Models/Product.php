<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "product";
    public $timestamps = true;

    protected $fillable = [
        'id', 
        'category_id', 
        'product_name',
        'description',
        'price',
        'discount',
        'image',
        'view',
        'updated_at',
        'created_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
