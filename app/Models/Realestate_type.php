<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Realestate_type extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function realestates(){
        return $this->belongsToMany(Realestate::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
