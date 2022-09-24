<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model;

class Basket extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'baskets';
    protected $fillable = [
        'productName', 'count', 'productId','userId','ip','price','day'
    ];
}
