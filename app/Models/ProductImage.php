<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
  protected $table = "image_product";

  protected $fillable =
      [
        'path', 
        'product_id'
      ];
       
    public function product()
    {
      return $this->belongsTo('App\Product', 'product_id');
    }
    
}