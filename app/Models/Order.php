<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table ="orders";

    public function user(){
        return $this->belongsTo(User::class);

    }

    public function orderItems(){
        return $this->hasMany(Order_item::class);
    }

    public function shipping(){
        return $this->hasMany(shipping::class,'order_id','id');


    }

    public function transactions(){
        return $this->hasOne(transaction::class,'order_id','id');
    }
}
