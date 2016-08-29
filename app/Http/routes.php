<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/',['uses'=>'FrontController@index',
    'as'=>'front.index']);

//RUTAS DEL FRONT END
Route::resource('front','FrontController');



//RUTAS DEL PANEL DE ADMINISTRACION

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){

    //nombre y el nombre del controlador
    //Genera todas las rutas que tiene el controlador create, index, delete, update, etc.
    Route::get('/',['as'=>'admin.index', function(){
        return view('admin.index');
    }]);
    
    Route::resource('users','UsersController');
    
    Route::resource('categories','CategoriesController');
    
    Route::resource('tags','TagsController');
    
    Route::resource('articles','ArticlesController');
    
    Route::resource('images','ImagesController');
    
});

Route::get('admin/auth/login', 
    ['uses'=>'Auth\AuthController@getLogin',
    'as'=>'admin.auth.login']);
Route::post('admin/auth/login', 
    ['uses'=>'Auth\AuthController@postLogin',
    'as'=>'admin.auth.login'] );
Route::get('admin/auth/logout', 
    ['uses'=> 'Auth\AuthController@getLogout',
    'as'=>'admin.auth.logout'] );