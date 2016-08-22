<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $table= "images";
    //campos que pueden ser mostrados en un json
    protected $fillable=["name","article_id"];
    
    public function Article(){
        return $this->belongsTo('App\Article');
    }
}
