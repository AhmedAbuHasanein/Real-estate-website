<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function account(){
        return $this->belongsTo(Account::class);
    }
    public function realestates(){
        return $this->hasMany(Realestate::class);
    }
    public function company_documents(){
        return $this->hasMany(Company_Documents::class);
    }
    public function followers(){
        return $this->hasMany(Follower::class);
    }
}
