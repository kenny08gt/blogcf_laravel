<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table= "categorys";
    //campos que pueden ser mostrados en un json
    protected $fillable=["name"];
    
    public function articles(){
        return $this->hasMany('App\Article');
    }
}
