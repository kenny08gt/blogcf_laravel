@extends('front.template.main')

@section('title')
    Home
@endsection

@section('content')
    <div class="row">
      @foreach($articles as $article)
        <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading"><strong>{{ $article->title }}</strong></div>
              <div class="panel-body">
                <a href="#" class="thumbnail">
                @foreach($article->images as $image)
                  <img src="/images/articles/{{ $image->name }}" style="width:200px;position:relative;display:inline-block"></img>
                @endforeach
                </a>
                <hr>
                <div class=""><a class=" btn btn-primary pull-left">{{ $article->category->name }}</a></div>
                <div class="pull-right">{{ $article->created_at->diffForHumans() }}</div>
              </div>
            </div>
        </div>
      @endforeach
        
    </div>
    {!! $articles->render() !!}
@endsection
