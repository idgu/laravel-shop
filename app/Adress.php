<?php

namespace Appp;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $fillable = ['user_id', 'voivodeship', 'city', 'zip_code', 'extra_info'];
}
