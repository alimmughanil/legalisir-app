<?php

namespace App\Models;

use App\Models\School;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RajaOngkirAddress extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function profile(){
        return $this->belongsTo(Profile::class);
    }
    public function school(){
        return $this->belongsTo(School::class);
    }
}