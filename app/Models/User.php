<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Order;
use App\Models\School;
use App\Models\Profile;
use App\Models\Document;
use App\Models\Shipment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $with = ['profile','school'];

    public function profile(){
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }
    public function document(){
        return $this->hasOne(Document::class, 'user_id', 'id');
    }
    public function school(){
        return $this->hasOne(School::class, 'user_id', 'id');
    }
    public function order(){
        return $this->hasOne(Order::class, 'user_id', 'id');
    }
    public function shipment(){
        return $this->hasOne(Shipment::class, 'user_id', 'id');
    }
}