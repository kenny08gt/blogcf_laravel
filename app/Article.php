<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table= "articles";
    //campos que pueden ser mostrados en un json
    protected $fillable=["title","content","category_id","user_id"];
    
    public function Category(){
        return $this->belongsTo('App\Category');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }
    
    public function images(){
        return $this->hasMany('App\Image');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
