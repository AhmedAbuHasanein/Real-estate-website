<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function account(){
        return $this->belongsTo(Account::class);
    }
    public function image_realestate_types(){
        return $this->hasMany(Realestate_type::class);
    }
}
