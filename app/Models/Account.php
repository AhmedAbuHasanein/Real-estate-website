<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
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
