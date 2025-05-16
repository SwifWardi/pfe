<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Str;
class Subcategory extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'category_id'];

    protected static function boot(){
        parent::boot();

        static::saving(function($model){
            if(empty($model->slug)){
                $model->slug = Str::slug($model->name);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
