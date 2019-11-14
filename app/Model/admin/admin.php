<?php

namespace App\Model\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\admin\role;

class admin extends Authenticatable
{
    use Notifiable;

public function role(){
    return $this->belongsToMany('App\Model\admin\role');
}

    protected $fillable = ['name','email','password','status','phone'];


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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

