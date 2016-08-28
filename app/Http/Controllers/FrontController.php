<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

use Carbon\Carbon;

class FrontController extends Controller
{
    //
    public function __contruct(){
        Carbon::setLocale('es');
    }
    public function index(){
        Carbon::setLocale('es');
        $articel=Article::orderBy('id','DESC')->paginate(6);
        $articel->each(function($articel){
            $articel->images;
            $articel->category();
        });
        
        //dd($articel);
        return view('front.index')->with('articles',$articel);
    }
}
