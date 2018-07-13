<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Delivery extends Model
{
    //
    protected $fillable = ['user_id', 'date', 'quantity','price','status'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
