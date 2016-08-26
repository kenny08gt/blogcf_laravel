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
            <td><a class="btn btn-danger" href="">Eliminar</a><a class="btn btn-warning">Modificar</a></td>
        </tr>
   @endforeach
   </table>
   {!! $users->render() !!}
@endsection