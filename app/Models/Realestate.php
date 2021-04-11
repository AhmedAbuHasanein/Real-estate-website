<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realestate extends Model
{
    use HasFactory;
    public function realestate_type(){
        $this->belongsTo(Realestate_type::class);
    }
    public function company(){
        $this->belongsTo(Company::class);
    }
    public function image_realestates(){
        $this->hasMany(Image_Realestate::class);
    }
}
