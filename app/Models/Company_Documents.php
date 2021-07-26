<?php

namespace App\Models;

use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company_Documents extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
