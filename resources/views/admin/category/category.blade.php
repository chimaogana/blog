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
            <form role="form" method='post' action="{{route('category.store')}}">
            {{ csrf_field() }}
            
              <div class="box-body">
              <div class="col-lg-offset-4 col-lg-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category title</label>
                  <input type="text" class="form-control" id="title" placeholder="category Title" name="name">
                </div>
               
                <div class="form-group">
                  <label for="exampleInputEmail1">category slug</label>
                  <input type="text" class="form-control" id="slug" placeholder="category slug" name="slug">
                </div>
                

        
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('category.index')}}" type="button" class="btn btn-warning">Back</a>
              </div></div>
          </div></div>
        

              

      <!-- ./row -->
    
    <!-- /.content -->
  </div></div>
@endsection