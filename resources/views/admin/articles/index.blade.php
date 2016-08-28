@extends('admin.template.main')

@section('title','Lista de articulos')

@section('content')
    <a class="btn btn-primary" href="{{ route('admin.articles.create') }}">Crear articulo</a>
    
    <table class="table table-striped">
        <thead>
            <th>Titulo</th>
        </thead>
   @foreach($articles as $article)
       <tr>
            <td>{{ $article->title }}</td>
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