<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Authenticatable
{
    use HasFactory;
    protected $fillable =['user_name'];
    public function user(){
        $this->hasOne(User::class);
    }
    public function admin(){
        $this->hasOne(Admin::class);
    }
    public function company(){
        $this->hasOne(Company::class);
    }
    public function profile(){
        $this->hasOne(profile::class);
    }
}
