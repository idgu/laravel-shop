<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads = '/images/products';
    protected $fillable = ['file'];

    public function getFileAttribute($photo) {
        return $this->uploads . '/' . $photo;
    }

    public function deletePhotoFromDisc(){
        return unlink(public_path() .  $this->file);
    }
}
