<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\admin\role;


class Permission extends Model
{

    
    



    public function roles(){
        $this->belongsToMany(role::class);
    }
}
