@extends('admin/layouts/app')
@section('content')
 <div class="content-wrapper">
 <div class="row">
 <div class="col-md-12">
 <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
                   @include ('includes/message')
            <!-- /.box-header -->
            <!-- form start -->
                       <form role="form" method="post" action="{{route('tag.update',$tag->id)}}">
            {{ csrf_field()}}
              {{ method_field('PUT')}}

            
              <div class="box-body">
              <div class="col-lg-offset-4 col-lg-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tag title</label>
                  <input type="text" value="{{$tag->name}}" class="form-control" id="title" placeholder="Tag title" name="name">
                </div>
               
                <div class="form-group">
                  <label for="exampleInputEmail1">Tag Slug</label>
                  <input type="text"  value="{{$tag->slug}}" class="form-control" id="slug" placeholder="slug" name="slug">
                </div>
                

        
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                    <a type="button" href="{{route('tag.index')}}" class="btn btn-warning">Back</a>
              </div></div>
          </div></div>
        

              

      <!-- ./row -->
    
    <!-- /.content -->
  </div></div>
@endsection