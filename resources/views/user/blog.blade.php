@extends('user/app')
@section('bg-img',asset('users/img/home-bg.jpg'))
@section('title','Clean Blog')
@section('sub-title','A Blog Theme by chima')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
.fa-thumbs-up:hover{
  color:red;
}

</style>

@endsection
@section('content')

  <!-- Main Content -->
  <div class="container" id='app'>
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
     <posts  v-for='value in blog'
     :title=value.title
      :subtitle=value.subtitle
       :created_at=value.created_at
       :key=value.index
       :post-id = value.id
       login = "{{ Auth::check() }}"
       :likes = value.likes.length
       :slug = value.slug></posts>
        <hr>
       
        
        <!-- Pager -->
        <div class="clearfix">
         {{ $posts->links() }}
        </div>
      </div>
    </div>
  </div>

  <hr>
@endsection
@section('footer')
<script src="{{asset('js/app.js')}}"></script>
@endsection
