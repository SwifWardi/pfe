<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'name',
        'product_id',
        'price',
        'user_id',
        'qty',
        'photo',
    ];

    public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}


    public function user(){
        $this->belongsTo(User::class);
    }
}
