  @extends('admin/layouts/app')
  @section('headsection')
  <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Theme style -->
  @endsection
  @section('content')
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         @include('admin.layouts.pageHead')
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Examples</a></li>
          <li class="active">Blank page</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Post</h3>
            @can('posts.create', Auth::user())
            <a href="{{route('post.create')}}" class="col-lg-offset-5 btn btn-success">Add New</a>
@endcan
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              
            </div>
          </div>
          <div class="box-body">
            Start creating your amazing application!
          </div>
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Table With Full Features</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Slug</th>
                    <th>Created_at</th>
                    @can('posts.update',Auth::user())
                    <th>Edit</th>
                    @endcan
                    @can('posts.delete',Auth::user())
                    <th>Delete</th>
                    @endcan
                  </tr>
                  </thead>
                  <tbody>
                  
                @foreach ($posts as $post )
                             

                  <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->subtitle}}</td>
                    <td>{{$post->slug}}</td>
                    <td>{{$post->created_at}}</td>
                    @can('posts.update',Auth::user())
                    <td><a href="{{route('post.edit',$post->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>@endcan
            <td>
            @can('posts.delete',Auth::user())
            <form id="delete-form-{{ $post->id }}" method="post" action="{{ route('post.destroy',$post->id) }}" style="display:none">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            
            </form>
             <a href="" onclick="if(confirm('Are you sure you want to delete this?'))
             {event.preventDefault();
             document.getElementById('delete-form-{{ $post->id }}')
             .submit()}else
             {event.preventDefault();}">
                    <span class="glyphicon glyphicon-trash"></span></a></td>
                  </tr>
                  @endcan

                @endforeach
    
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Slug</th>
                    <th>Created_at</th>
                    @can('posts.update',Auth::user())
                    <th>Edit</th>
                    @endcan
                    @can('posts.delete',Auth::user())
                    <th>Delete</th>
                    @endcan
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
          <!-- /.box-body -->
          <div class="box-footer">
            Footer
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
    

  @endsection
  @section('footersection')
    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
    @endsection