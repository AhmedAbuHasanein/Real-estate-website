<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscripe extends Model
{
    use HasFactory;
    public function usersubsecripe(){
        return $this->belongsTo(User::class);
    }
    public function companysubsecripe(){
        return $this->belongsTo(Company::class);
    }
}
