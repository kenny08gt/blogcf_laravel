@extends('admin.template.main')

@section('title','Lista de usuarios')

@section('content')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Registrar nuevo usuario</a>
    <table class="table table-striped">
        <thead>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Email</th>
            <th>Acción</th>
        </thead>
   @foreach($users as $user)
       <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->type }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form  action="{{ route('admin.users.destroy',$user->id) }}" method="POST" class="col s12">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Seguro que desea eliminar el usuario {{ $user->name }}?')" class="btn btn-danger">Eliminar</button>
                </form>
                <a class="btn btn-warning">Modificar</a>
            </td>
        </tr>
   @endforeach
   </table>
   {!! $users->render() !!}
@endsection