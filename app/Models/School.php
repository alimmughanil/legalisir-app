<?php

namespace App\Models;

use App\Models\User;
use App\Models\Profile;
use App\Models\RajaOngkirAddress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function profile(){
        return $this->belongsTo(Profile::class);
    }
    public function rajaOngkirAddress(){
        return $this->hasOne(RajaOngkirAddress::class,'id','school_address_id');
    }
}