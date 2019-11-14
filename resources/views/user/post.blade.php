@extends('user/app')
@section('bg-img',asset('storage/cover_images/'.$post->image))
@section('title',$post->title)
@section('sub-title',$post->subtitle)
@section('content')

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8  col-lg-offset-2 col-md-10 col-md-offset-1" style="margin-right:20px; boarder-raduis:5px;padding:5px;">
        
        <small class="pull-left">Created at {{$post->created_at}}</small>
        @foreach ($post->categories as $category )
                 <a href="{{route('category',$category)}}"><small class="pull-right" style="margin-right:20px; padding:10px;">
                 {{$category->name}}</small> </a>
        @endforeach
        

      {!! htmlspecialchars_decode($post->body)!!}
    {{-- Tag       --}}
    <h3>Tag Cloud </h3><br>
       @foreach ($post->tags as $tag )
                 <a href="{{route('tag',$tag)}}"><small class="pull-left" style="margin-right:20px; boarder-raduis:5px; border:1px solid gray;padding :5px;">
                 {{$tag->name}}</small></a> 
        @endforeach

        </div>
        </div>
          
    </div>
  </article>

  <hr>
@endsection