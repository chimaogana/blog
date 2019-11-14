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
            <form role="form" method="post" action="{{route('Permission.store')}}">
            {{ csrf_field()}}
            
              <div class="box-body">
              <div class="col-lg-offset-4 col-lg-6">
                <div class="form-group">
                  <label for="name">Permission name</label>
                  <input type="text" class="form-control" id="title" placeholder="permission name" name="name">
                </div>
                <div class="form-group">
                  <label for="name">Permission for</label>
                  <select name="for" id="for" class="form-control">
                  <option select disable>Select Permission for</option>
                  <option value="user">User</option>
                  <option value="post">Post</option>
                  <option value="other">Other</option>      
                  </select>
                </div>
                </div>
                
                
                
                </div>

        
            <div class="col-lg-offset-4 col-lg-6">
                <button type="submit" class="btn btn-primary">Submit</button>
                    <a type="button" href="{{route('Permission.index')}}" class="btn btn-warning">Back</a>
              </div></div>
          </div></div>
        

              

      <!-- ./row -->
    
    <!-- /.content -->
  </div></div>
@endsection