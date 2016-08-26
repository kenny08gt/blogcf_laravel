<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table= "tags";
    //campos que pueden ser mostrados en un json
    protected $fillable=["name"];
    
    public function articles(){
        return $this->belongsToMany('App\Article');
    }
    
    public function scopeSearch($query,$name){
        return $query->where('name','LIKE',"%$name%");
    }
}
