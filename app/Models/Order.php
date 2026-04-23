<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    //
    protected $fillable = ['user_id','order_number','subtotal','tax','shipping','total','payment_method','payment_status','shipping_adderess'];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
    public function user(){
        return $this->BelongsTo(User::class);
    }
}
