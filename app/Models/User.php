<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function account(){
        return $this->belongsTo(Account::class);
    }
    public function followers(){
        return $this->hasMany(Follower::class);
    }
}
