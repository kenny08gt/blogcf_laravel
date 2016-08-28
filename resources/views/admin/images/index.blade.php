@extends('admin.template.main')

@section('title','Lista de imagenes')

@section('content')
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Articulo</th>
        </thead>
   @foreach($images as $image)
       <tr>
           <td>{{ $image->id }}</td>
            <td>{{ $image->name }}</td>
            <td>{{ $image->article->title }}</td>
        </tr>
   @endforeach
   </table>
   <div class="row">
       @foreach($images as $image)
       <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <img src="/images/articles/{{ $image->name }}" class="img-responsive"></img>
              </div>
              <div class="panel-footer">{{ $image->article->title }}</div>
            </div>   
        </div>
       @endforeach
   </div>
    
@endsection