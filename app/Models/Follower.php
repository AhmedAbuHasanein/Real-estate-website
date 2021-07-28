<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follower extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function userFollower(){
        return $this->belongsTo(User::class);
    }
    public function companyFollower(){
        return $this->belongsTo(Company::class);
    }
}
