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
            <form role="form" method="post" action="{{route('user.store')}}">
            {{ csrf_field()}}
            
              <div class="box-body">
              <div class="col-lg-offset-4 col-lg-6">
                <div class="form-group">
                  <label for="name">user name</label>
                  <input type="text" class="form-control" id="title" placeholder="user name" name="name" value="{{ old('name') }}">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                  <label for="phone">phone</label>
                  <input type="text" class="form-control" id="phone" placeholder="phone" name="phone" value="{{ old('phone') }}">
                </div>
                
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="password" name="password" value="{{ old('password') }}">
                </div>
                
                <div class="form-group">
                  <label for=" password-confirm ">Confirm Password</label>
                  <input type="password" class="form-control" id="password-confirm" placeholder="password_confirmation" name="password_confirmation">
                </div>
                <div class="form-group">
                <label for="confirm password">Status</label>
                <div class='checkbox'>
                <label><input type='checkbox' name="status" @if (old('status') == 1)
                checked
                    
                @endif value="1">Status</label></div>

                  
                </div>
                 
                    
                
                <div class="form-group col-lg-12">
                @foreach ($roles as $role )
                    <div class='col-lg-3'>
                    <div class='checkbox'>
                    <label><input type='checkbox' name="role[]" value="{{$role->id}}">{{$role->name}}</label>
                    </div>
                    
                    </div>
                @endforeach
                  {{-- <label for="role">Assign Role</label>
                  <select name="role" id="" class="form-control">
                  <option value="0">Editor</option>
                  <option value="1">Publisher</option>
                  <option value="2">writer</option> --}}
                  {{-- </select> --}}
                  {{-- <input type="checkbox"> --}}
                  </div>
               
                
                

        
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                    <a type="button" href="{{route('user.index')}}" class="btn btn-warning">Back</a>
              </div></div>
          </div></div>
        

              

      <!-- ./row -->
    
    <!-- /.content -->
  </div></div>
@endsection