@extends('admin.template.main')

@section('title','Agregar articulo')

@section('content')
    {!! Form::open(['route'=>'admin.articles.store','method'=>'POST','files'=>true]) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('title','Titulo') !!}
            {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo del articulo']) !!}
        </div>
        <div class="form-group ">
            {!! Form::label('content','Contenido') !!}
            {!! Form::textarea('content',null,['class'=>'form-control textarea-trumbowyg ']) !!}
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
            <br>
            {!! Form::label('image-holder','Vista previa') !!}
            <div id="image-holder"> </div>
        </div>
        
        <div class="form-group">
            {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection

@section('js')
<style type="text/css">.thumb-image{width:100px;padding:5px;}</style>
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
    $(".textarea-trumbowyg").trumbowyg();

     $("#image").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image",
                    "title":"vista previa"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                image_holder.append("<br>")
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("Este navegador no soporta vista previa de imagenes");
            }
          } else {
            alert("Por favor solo selecciones imagenes");
          }
        });
      
</script>

@endsection