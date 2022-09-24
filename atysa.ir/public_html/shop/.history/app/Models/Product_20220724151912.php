<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'products';
    protected $fillable = [
        'name','image','description','isValid','owner','size',
        'inStock','quantity','url','comments','rank','calory'
    ];
}
