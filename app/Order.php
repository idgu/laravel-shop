<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'products', 'adress', 'status', 'orderId', 'totalAmount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getProductsAttribute($value)
    {
        $pairs = explode('|', $value);
        $products = array();

        $x=0;
        foreach ($pairs as $pair) {
            $nums = explode('-', $pair);
            $products[$x]['product'] = Product::findOrFail($nums[0]);
            $products[$x]['qty'] = $nums[1];
            $x++;
        }

        return $products;


    }

}
