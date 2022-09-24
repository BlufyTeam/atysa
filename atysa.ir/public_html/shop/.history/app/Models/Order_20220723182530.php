<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Order extends Model
{
    public $timestamps = true;
    protected $connection = 'mongodb';
    protected $collection = 'orders';
    protected $fillable = [
        'total','shippingFee','products','status','totalQuantity','isPaid','paymentCode'
    ];
}
