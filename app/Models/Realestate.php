<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realestate extends Model
{
    use HasFactory;
    public function realestate_type(){
        return $this->belongsTo(Realestate_type::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function image_realestates(){
        return $this->hasMany(Image_Realestate::class);
    }
}
