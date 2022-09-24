<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Banner extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'banners';
    protected $fillable = [
        'url', 'order'
    ];
}
