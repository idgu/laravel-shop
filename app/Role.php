<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
