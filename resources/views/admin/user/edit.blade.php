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
            <form role="form" method="post" action="{{route('user.update',$user->id)}}">
            {{ csrf_field()}}
            {{method_field('PUT')}} {{ method_field('PUT')}}
            
              <div class="box-body">
              <div class="col-lg-offset-4 col-lg-6">
                <div class="form-group">
                  <label for="name">user name</label>
                  <input type="text" class="form-control" id="title" placeholder="user name" name="name" value="@if (old('name')){{ old('name')}}@else{{$user->name}}@endif">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" id="email" placeholder="email" name="email" value="@if (old('email')){{ old('email')}}@else{{$user->email}}@endif">
                </div>
                <div class="form-group">
                  <label for="phone">phone</label>
                  <input type="text" class="form-control" id="phone" placeholder="phone" name="phone" value="@if (old('phone')){{ old('phone')}}@else{{$user->phone}}@endif">
                </div>
                
                
                <div class="form-group">
                <label for="status">Status</label>
                <div class='checkbox'>
                <label><input type='checkbox' name="status" @if (old('status') == 1 || $user->status ==1)
                checked
                    
                @endif value="1">Status</label></div>

                  
                </div>
                 
                    <label>Assign Role</label>
                  <div class="form-group col-lg-12">
                  
                @foreach ($roles as $role )
                    <div class='col-lg-3'>
                    <div class='checkbox'>
                    <label><input type='checkbox' name="role[]" value="{{$role->id}}"
                      @foreach ($user->role as $user_role)
                @if ($user_role->id == $role->id)
                checked
                @endif
               @endforeach >{{$role->name}}</label>
                    </div>
                    
                    </div>
                @endforeach

                {{-- <div class="form-group col-lg-12">
                
            
                    <div class='col-lg-3'>
                      @foreach ($roles as $role )
                        <div class='checkbox'>
                    <label><input type='checkbox' name="role[]" value="{{$role->id}}"
                   
                    
                @endforeach --}}
                {{-- >{{$role->name}}</label> --}}
                    {{-- </div>
                    @endforeach --}}
                     
                    
                    
                
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