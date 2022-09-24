<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model;

class Basket extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'baskets';
    protected $fillable = [
        'product', 'count', 'parentId','description'
    ];
}
