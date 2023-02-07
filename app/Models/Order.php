<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function document(){
        return $this->hasOne(Document::class, 'id', 'document_id');
    }

    public function payment(){
        return $this->hasOne(Payment::class, 'order_id', 'id');
    }
    public function shipment(){
        return $this->hasOne(Shipment::class, 'order_id', 'id');
    }
}