@extends('admin.template.main')

@section('title','Lista de categorias')

@section('content')
    <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">Crear nueva categoria</a>
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Operaciones</th>
        </thead>
   @foreach($categories as $category)
       <tr> <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <form  action="{{ route('admin.categories.destroy',$category->id) }}" method="POST" class="col s12" style="display:inline-block;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Seguro que desea eliminar la categoria {{ $category->name }}?')" class="btn btn-danger">Eliminar</button>
                </form>
                <a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-warning" style="display:inline-block;">Modificar</a>
                
            </td>
        </tr>
   @endforeach
   </table>
   {!! $categories->render() !!}
@endsection