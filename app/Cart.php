<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Cart extends Model
{
    //
    protected $guarded=['id'];
    public function products(){
      return $this->hasMany(Product::class);
    }
  
}
