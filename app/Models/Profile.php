<?php

namespace App\Models;

use App\Models\User;
use App\Models\School;
use App\Models\Document;
use App\Models\RajaOngkirAddress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['rajaOngkirAddress'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function school(){
        return $this->hasOne(School::class,'id','school_id');
    }
    public function rajaOngkirAddress(){
        return $this->hasOne(RajaOngkirAddress::class,'id','address_id');
    }
}