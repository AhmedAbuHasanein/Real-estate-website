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
    public function proof_of_ownership_real_estates(){
        return $this->belongsToMany(Proof_Of_Ownership_RealEstate::class);
    }
}
