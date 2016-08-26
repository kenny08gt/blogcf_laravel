@extends('admin.template.main')

@section('title','Agregar articulo')

@section('content')
    {!! Form::open(['route'=>'admin.articles.store','method'=>'POST','files'=>true]) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('title','Titulo') !!}
            {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo del articulo']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content','Contenido') !!}
            {!! Form::textarea('content',null,['class'=>'form-control','placeholder'=>'Cuerpo de articulo']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Categoria') !!}
            {!! Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'Seleccione una opción','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tag_id','Tag') !!}
            {!! Form::select('tag_id',$tags,null,['class'=>'form-control','multiple','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('image','Imagen') !!}
            {!! Form::file('image') !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection