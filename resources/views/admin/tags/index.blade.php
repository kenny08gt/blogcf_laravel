@extends('admin.template.main')

@section('title','Lista de tags')

@section('content')
    <a class="btn btn-primary" href="{{ route('admin.tags.create') }}">Crear nueva tag</a>
    
    <!-- Buscado tags-->
    {!! Form::open(['route'=>'admin.tags.index','method'=>'GET','class'=>'navbar-form pull-right']) !!}
        <div class="input-group">
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar tag..','aria-describedby'=>'search']) !!}
            <span class="input-group-addon" id="search">
                <span class="glyphicon glyphicon-search" id="search" aria-hidden="true"></span>
            </span>
        </div>
    {!! Form::close() !!}
    <!-- Buscado tags-->
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Operaciones</th>
        </thead>
   @foreach($tags as $tag)
       <tr>
           <td>{{ $tag->id }}</td>
            <td>{{ $tag->name }}</td>
            <td>
                <form  action="{{ route('admin.tags.destroy',$tag->id) }}" method="POST" class="col s12" style="display:inline-block;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Seguro que desea eliminar la tag {{ $tag->name }}?')" class="btn btn-danger">Eliminar</button>
                </form>
                <a href="{{ route('admin.tags.edit',$tag->id) }}" class="btn btn-warning" style="display:inline-block;">Modificar</a>
                
            </td>
        </tr>
   @endforeach
   </table>
   {!! $tags->render() !!}
@endsection