@extends('admin.template.main')

@section('title','Agregar tag')

@section('content')
    {!! Form::open(['route'=>'admin.tags.store','method'=>'POST']) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre tag']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection