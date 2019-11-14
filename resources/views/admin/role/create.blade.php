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
            <form role="form" method="post" action="{{route('role.store')}}">
            {{ csrf_field()}}
            
              <div class="box-body">
              <div class="col-lg-offset-4 col-lg-6">
                <div class="form-group">
                  <label for="name">role name</label>
                  <input type="text" class="form-control" id="title" placeholder="role name" name="name">


               <div class="row">
                  <div class="col-lg-4">
                <label for="name">Posts Permission</label>
                @foreach ( $permissions as $permission)

                @if ($permission->for=='post')
                    
              
                     <div class="checkbox">
               
                <label> <input type="checkbox" name="permission[]" value="{{$permission->id}}" >{{$permission->name}}</label></div>
                  @endif
                @endforeach
            


                </div>

                
                <div class="col-lg-4">
                 <label for="name">User Permission</label>
                  @foreach ( $permissions as $permission)

                @if ($permission->for=='user')
                    
              
                     <div class="checkbox">
               
                <label> <input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label></div>
                  @endif
                @endforeach</div>
             <div class="col-lg-4">
                 <label for="name">Other Permission</label>
                  @foreach ( $permissions as $permission)

                @if ($permission->for=='other')
                    
              
                     <div class="checkbox">
               
                <label> <input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label></div>
                  @endif
                @endforeach

 
                </div>
                </div>
              </div>
                
                
                
                
                </div>
</div>
        
            <div class="col-lg-offset-4 col-lg-6">
                <button type="submit" class="btn btn-primary">Submit</button>
                    <a type="button" href="{{route('role.index')}}" class="btn btn-warning">Back</a>
              </div></div>
          </div>
          </div>
        

              

      <!-- ./row -->
    
    <!-- /.content -->
  </div></div>
@endsection