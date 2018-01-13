<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function icon()
    {
        return $this->belongsTo(Photo::class, 'icon_id');
    }


    protected $fillable = [
        'category_id',
        'subcategory_id',
        'photo_id',
        'icon_id',
        'brand',
        'model',
        'price',
        'description',
        'released_on'
    ];


}
