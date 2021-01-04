<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Category relationship
    public function categories(){
      return $this -> belongsToMany('App\Models\Category');
    }

    //User id relationship
    public function author(){
      return $this -> belongsTo('App\Models\User','user_id','id');
    }


}
