<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proof_Of_Ownership_RealEstate extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function realestate(){
        return $this->belongsTo(Realestate::class);
    }
}
