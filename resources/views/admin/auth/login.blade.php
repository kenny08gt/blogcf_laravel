@extends('admin.template.main')

@section('title','Iniciar sesión')

@section('content')
    {!! Form::open(['route'=>'admin.auth.login','method'=>'POST']) !!}
    {!! csrf_field() !!}
    <div class="form-group">
        {!! Form::label('email','Correo electronico') !!}    
        {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'cooreo@c.c']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Contraseña') !!}    
        {!! Form::password('password',['class'=>'form-control','placeholder'=>'****']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Acceder',['class'=>'btn btn-primary']) !!}    
    </div>
    {!! Form::close() !!}

@endsection