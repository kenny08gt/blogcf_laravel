<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
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
    public function index(Request $request)
    {   //$tags=Tag::search($request->name)->orderBy('id','DESC')->paginate(5);
        $articles=Article::search($request->title)->orderBy('id','DESC')->paginate(5);
        $articles->each(function($articles){
            $articles->Category;
            $articles->User;
        });
        //dd($articles);
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
    public function store(ArticleRequest $request)
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
        $article=Article::find($id);
        $article->category;
        $article->tags;
        $article->images;
        //dd($article);
        
        $Mytags=$article->tags->lists('id')->ToArray();
        
        $categories=Category::orderBy('name','DESC')->lists('name','id');
        $tags=Tag::orderBy('name','DESC')->lists('name','id');
        return view('admin.articles.edit')->with('categories',$categories)
        ->with('tags',$tags)
        ->with('Mytags',$Mytags)
        ->with('article',$article);
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
        $article=Article::find($id);
        $article->fill($request->all());
        $article->save();
        
        $article->tags()->sync($request->tags);
         flash('Se ha editado el articulo '.$article->title,'warning');
        //eliminar imagenes
        
        
        return redirect()->route('admin.articles.index');
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
        $article=Article::find($id);
        $article->delete();
        flash('Se ha eliminado el articulo '.$article->title,'danger');
        //eliminar imagenes
        
        
        return redirect()->route('admin.articles.index');
    }
}
