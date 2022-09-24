<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Order extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'hotboxes';
    protected $fillable = [
        'name','images','mainImage','details','isValid','ownerId','inStock','quantity','url','comments','rank'
    ];
    public $timestamps = true;
}
