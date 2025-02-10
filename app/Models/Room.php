<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function gallery() {
        return $this->morphMany(Image::class, 'imageable')
        ->where('type', 'gallery');
    }

    public function getImgPathAttribute() {
        $src = asset('images/noo_imagee.jpg');
        if($this->image) {
            $src = asset('images/'.$this->image->path);
        }
        return $src;
    }

}






