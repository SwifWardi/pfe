<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\product;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'isShownHomePage'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function product(){
        return $this->hasMany(product::class);
    }

}
