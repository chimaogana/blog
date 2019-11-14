@extends('admin/layouts/app')
@section('headsection')

  <link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
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
            <form role="form" method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
            {{ csrf_field()}}
            
              <div class="box-body">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Post Title</label>
                  <input type="text" class="form-control" id="title" placeholder="title" name="title">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Post subtitle</label>
                  <input type="text" class="form-control" id="subtitle" placeholder="subtitle" name="subtitle">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Post Slug</label>
                  <input type="text" class="form-control" id="slug" placeholder="slug" name="slug">
                </div></div>
                
                
                <div class="form-group">
                 <br>
                 <div class="pull-right">
                  <label for="image">File input</label>
                  <input type="file" name="image" id="exampleInputFile">

                 </div>
                 <div class="checkbox pull-left">
                  <label>
                    <input type="checkbox" name="status" value="1">
                        
                     Publish
                  </label>

     </div>             
                </div>
<br><br>
                    <div class="form-group" style="margin-top:18px;">
              <label>Select Tags</label>
              <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 50%;" tabindex="-1" aria-hidden="true" name="tags[]">
              @foreach ($tags as $tag )
              <option value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
              </select>
              </div>
              <div class="form-group" style="margin-top:18px;">
              <label>Select Categories</label>
              <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 50%;" tabindex="-1" aria-hidden="true" name="categories[]">
              @foreach ($categories as $category )
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
              </select></div>
                

              </div></div></div>
                


          <div class="box">
          
            <div class="box-header">
              <h3 class="box-title">Write post body here
                <small>Simple and fast</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
               
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                <textarea  name="body"
                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
              
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('post.index')}}" type="button" class="btn btn-warning">Back</a>
              </div></div>
          </div>
        

              

    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section> --}}

          <!-- /.box -->

        <!-- /.col-->
      </div></div></div>
      <!-- ./row -->
    
    <!-- /.content -->
  </div></div>
@endsection
@section('footersection')
<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/plugins/iCheck/icheck.min.js')}}"></script>

<script src="//cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<script>


  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })

 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
@endsection

