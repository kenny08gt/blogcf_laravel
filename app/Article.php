<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use Sluggable;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    //
    protected $table= "articles";
    //campos que pueden ser mostrados en un json
    protected $fillable=["title","content","categorie_id","user_id"];
    
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
