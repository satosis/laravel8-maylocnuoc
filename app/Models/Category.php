<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $guarded=[''];

    public function products(){
        return $this->hasMany(Product::class,'id');
    }

    protected static function booted () {
        static::deleting(function(Category $category) {
            Product::where("pro_category", $category->id)->delete();
        });
    }
}
