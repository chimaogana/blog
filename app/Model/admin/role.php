<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\admin\admin;
use App\Model\admin\Permission;

class role extends Model
{
    
    
    public function admin(){
        return $this->belongsToMany('App\Model\admin\admin');
    }


    public function Permissions(){
    return $this->belongsToMany(Permission::class);
}
}
