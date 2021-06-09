<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public function account(){
        return $this->belongsTo(Account::class);
    }
    public function realestates(){
        return $this->hasMany(Realestate::class);
    }
    public function subsecriperes(){
        return $this->hasMany(Subscripe::class);
    }
}
