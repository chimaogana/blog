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
                       <form role="form" method="post" action="{{route('role.update',$role->id)}}">
            {{ csrf_field()}}
              {{ method_field('PUT')}}

            
              <div class="box-body">
              <div class="col-lg-offset-4 col-lg-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">role title</label>
                  <input type="text" value="{{$role->name}}" class="form-control" id="title" placeholder="role title" name="name">
                </div>
  
                



               <div class="row">
                  <div class="col-lg-4">
                <label for="name">Posts Permission</label>
                @foreach ( $permissions as $permission)
               @if ($permission->for=='post')
                <div class="checkbox">
                <label> <input type="checkbox" name="permission[]" value="{{$permission->id}}" @foreach ($role->permissions as $role_permit)
                @if ($role_permit->id == $permission->id)
                checked
                    
                @endif
                    
                @endforeach>{{$permission->name}}</label></div>
                @endif
                @endforeach
                </div>
                <div class="col-lg-4">
                <label for="name">User Permission</label>
                @foreach ( $permissions as $permission)
                @if ($permission->for=='user')
               <div class="checkbox">
               <label> <input type="checkbox" name="permission[]" value="{{$permission->id}}" @foreach ($role->permissions as $role_permit)
                @if ($role_permit->id == $permission->id)
                checked
                    
                @endif
                    
                @endforeach>{{$permission->name}}</label></div>
                  @endif
                @endforeach</div>
               <div class="col-lg-4">
               <label for="name">Other Permission</label>
               @foreach ( $permissions as $permission)
               @if ($permission->for=='other')
               <div class="checkbox">
                <label> <input type="checkbox" name="permission[]" value="{{$permission->id}}" @foreach ($role->permissions as $role_permit)
                @if ($role_permit->id == $permission->id)
                checked
                    
                @endif
                    
                @endforeach>{{$permission->name}}</label></div>
                  @endif
                @endforeach
                </div>
                </div>
              <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a type="button" href="{{route('role.index')}}" class="btn btn-warning">Back</a>
              </div></div>
          </div></div>
        

              

      <!-- ./row -->
    
    <!-- /.content -->
  </div></div>
@endsection