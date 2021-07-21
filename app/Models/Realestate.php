<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Realestate extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function realestate_type(){
        return $this->belongsTo(Realestate_type::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function image_realestates(){
        return $this->hasMany(Image_Realestate::class);
    }
    public function real_estate_documents(){
        return $this->hasMany(RealEstateDocuments::class);
    }
}
