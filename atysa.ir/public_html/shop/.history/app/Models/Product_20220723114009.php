<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'hotboxes';
    protected $fillable = [
        'name','images','mainImage','details','lang','ownerId'
    ];
}
