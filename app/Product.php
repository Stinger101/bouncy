<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded=['id'];
    public function cart(){
    $this->belongsToMany(Cart::class);
  }
  public function addToCart($user_id)
  {
    // code...
    $this->cart()->create(compact('user_id'));
  }
}
