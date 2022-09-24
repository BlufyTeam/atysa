<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Order extends Model
{
    public $timestamps = true;
    protected $connection = 'mongodb';
    protected $collection = 'orders';
    protected $fillable = [
        'total','shippingFee','productsFee','products','status'//: 1- editable 2- inserted 3- sent 4- received 5- rejected
        ,'totalQuantity','isPaid','paymentDetails','OwnerId'
    ];
}
