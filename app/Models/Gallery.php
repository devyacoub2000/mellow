<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function image() {
        return $this->morphOne(image::class, 'imageable');
    }


    public function getImgPathAttribute() {
        $src = asset('images/noo_imagee.jpg');
        if($this->image) {
            $src = asset('gallery/'.$this->image->path);
        }   
        return $src;
    }

}
