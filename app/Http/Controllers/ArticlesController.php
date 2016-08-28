<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles=Article::orderBy('id','DESC')->paginate(5);
        return view('admin.articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::orderBy('name','DESC')->lists('name','id');
        $tags=Tag::orderBy('name','DESC')->lists('name','id');
        
        return view('admin.articles.create')
            ->with('categories',$categories)
            ->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //manipulacion de imagenes
        //dd($request->tags);
        if($request->file('image')){
            $file=$request->file('image');
            $name='blogcd_'.time().'.'.$file->getClientOriginalExtension();
            $path=public_path().'/images/articles/';
            $file->move($path,$name);    
        }
        //dd($request);
        $article=new Article($request->all());
        $article->user_id=\Auth::user()->id;
        $article->save();
        
        $article->tags()->sync($request->tags);
        
        if(isset($name)){
        $image=new Image();
        $image->name=$name;
        $image->article()->associate($article);
        $image->save();
        }
        
        flash('Articulo creado exitosamente! '.$article->title,'success');
        
        return redirect()->route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
