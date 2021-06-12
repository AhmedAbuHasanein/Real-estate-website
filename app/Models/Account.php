<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =['user_name'];
    public function user(){
        return  $this->hasOne(User::class);
    }
    public function admin(){
        return $this->hasOne(Admin::class);
    }
    public function company(){
        return $this->hasOne(Company::class);
    }
    public function profile(){
       return $this->hasOne(profile::class);
    }
}
