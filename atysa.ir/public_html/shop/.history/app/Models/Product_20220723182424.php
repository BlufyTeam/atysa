<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'products';
    protected $fillable = [
        'name','images','mainImage','details','isValid','ownerId','inStock','quantity','url','comments','rank'
    ];
}
