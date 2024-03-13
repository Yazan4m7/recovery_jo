<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = ['id','content','key','userID'];
    public $incrementing = false;

    public function items () {
        return $this->hasMany('App\Models\CartItem', 'Cart_id');
    }


}