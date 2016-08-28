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
            {!! Form::label('categorie_id','Categoria') !!}
            {!! Form::select('categorie_id',$categories,null,['class'=>'form-control select-category','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tags','Tag') !!}
            {!! Form::select('tags[]',$tags,null,['class'=>'form-control select-tag','multiple','required']) !!}
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

@section('js')
<script type="text/javascript">
    $(".select-tag").chosen({
        placeholder_text_multiple:'Seleccione un maximo de tres tags',
        max_selected_options:3,
        no_results_text:'No existe un tag con ese nombre :('
    });
    $(".select-category").chosen({
        placeholder_text_single: 'Elija una categoría',
        no_results_text:'No existe una categoria con ese nombre :('
    });
</script>

@endsection