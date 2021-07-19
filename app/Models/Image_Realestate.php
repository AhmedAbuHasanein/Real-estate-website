<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image_Realestate extends Model
{

    use SoftDeletes;
    public function realestates(){
        return $this->belongsToMany(Realestate::class);
    }
}
