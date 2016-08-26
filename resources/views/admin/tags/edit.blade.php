@extends('admin.template.main')

@section('title','Editar tag '.$tag->name)

@section('content')
    {!! Form::open(['route'=>['admin.tags.update',$tag->id],'method'=>'PUT']) !!}
    {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name',$tag->name,['class'=>'form-control','placeholder'=>'Nombre tag']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Guardar cambios',['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection