<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $connection = 'mongodb';
    protected $collection = 'users';
    use Notifiable;
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName','lastName', 'email', 'password','type','mobile','activationKey','orders','avatar','products','activated','addresses','activationKey'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function fullName(){
        if(isset($this->firstName && $this->lastName)){
            return $this->firstName . ' ' . $this->lastName;
        }else{
            
        }
        
    }
}
