<?php

namespace App\Models;

use App\Models\User;
use App\Models\School;
use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function school(){
        return $this->hasOne(School::class,'id','school_id');
    }
}
