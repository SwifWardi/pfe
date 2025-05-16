<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\product;
use App\Models\User;

class Wishlist extends Model
{

    protected $fillable = [
        'product_id',
        'user_id'
    ];

    public function product(){
       return $this->belongsTo(product::class);
    }

    public function user(){
       return $this->belongsTo(User::class);
    }
}
