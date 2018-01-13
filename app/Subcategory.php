<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['category_id', 'name'];

    public function products()
    {
        return $this->hasMany( Product::class);
    }

    public function category()
    {
        return $this->belongsTo( Category::class);
    }
}
