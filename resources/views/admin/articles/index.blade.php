@extends('admin.template.main')

@section('title','Lista de articulos')

@section('content')
    <a class="btn btn-primary" href="{{ route('admin.articles.create') }}">Crear articulo</a>
    <!-- Buscado tags-->
    {!! Form::open(['route'=>'admin.articles.index','method'=>'GET','class'=>'navbar-form pull-right']) !!}
        <div class="input-group">
            {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Buscar articulo..','aria-describedby'=>'search']) !!}
            <span class="input-group-addon" id="search">
                <span class="glyphicon glyphicon-search" id="search" aria-hidden="true"></span>
            </span>
        </div>
    {!! Form::close() !!}
    <!-- Buscado tags-->
    
    <table class="table table-striped">
        <thead>
            <th>
                ID
            </th>
            <th>Titulo</th>
            <th>
                Categoria
            </th>
            <th>
                User
            </th>
            <th>
                Acciones
            </th>
        </thead>
   @foreach($articles as $article)
       <tr>
           <td>{{ $article->id }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->category->name }}</td>
            <td>{{ $article->user->name }}</td>
            <td>
                <form  action="{{ route('admin.articles.destroy',$article->id) }}" method="POST" class="col s12" style="display:inline-block;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Seguro que desea eliminar el articulo {{ $article->title }}?')" class="btn btn-danger">Eliminar</button>
                </form>
                <a href="{{ route('admin.articles.edit',$article->id) }}" class="btn btn-warning" style="display:inline-block;">Modificar</a>
                
            </td>
        </tr>
   @endforeach
   </table>
   {!! $articles->render() !!}
@endsection