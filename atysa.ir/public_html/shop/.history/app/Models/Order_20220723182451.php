<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Order extends Model
{
    public $timestamps = true;
    protected $connection = 'mongodb';
    protected $collection = 'orders';
    protected $fillable = [
        'name','total','shippingFee','products','isValid','ownerId','inStock','quantity','url','comments','rank'
    ];
}
