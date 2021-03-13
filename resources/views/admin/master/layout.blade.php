<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dairy Farm Management System</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
  <style>
    label.error {
      color: red;
      font-family: times-new-romans;
    }
  </style>
  <link rel="icon" href="/frontend/images/favicon.png" type="image/gif" sizes="16x16">
  <link rel="stylesheet" href="{!!asset('admin/css/bootstrap.min.css')!!}">
  <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/select2.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/bootstrap-notifications.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/admin.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/admin-skins.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('summernote/summernote.css')}}">

  <!-- Dairy farm management system -->
  <link media="all" type="text/css" rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link media="all" type="text/css" rel="stylesheet" href="{{url('frontend/css/font-awesome.min.css')}}">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Ionicons -->
  <link media="all" type="text/css" rel="stylesheet" href="{{url('frontend/css/ionicons.min.css')}}">
  <!-- Simple Line Icon -->
  <link media="all" type="text/css" rel="stylesheet" href="{{url('frontend/css/simple-line-icons.css')}}">
  <!-- Theme style -->
  <link media="all" type="text/css" rel="stylesheet" href="{{url('frontend/css/AdminLTE.css')}}">
  <link media="all" type="text/css" rel="stylesheet" href="{{url('frontend/css/_all-skins.css')}}">
  <link media="all" type="text/css" rel="stylesheet" href="{{url('frontend/css/bootstrap-tagsinput.css')}}">
  <link media="all" type="text/css" rel="stylesheet" href="{{url('frontend/css/style.css')}}">








  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @yield('style')
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="{{asset('admin/js/jquery.min.js')}}"></script>
</head>

<body class="sidebar-mini skin-green-light ">
  <div class="wrapper">
    @include('admin.master.header')
    @include('admin.master.sidebar')

    <!-- <div class="content-wrapper"> -->
    @yield('content')
    <!-- </div> -->
    <footer class="text-center" style="max-height:50px">
      <div class="pull-right hidden-xs">
        <b>Developed By- </b> <a target="_blank">RBZS</a>
      </div>
      <strong>Copyright &copy; 2010-<?php echo date("Y"); ?> <a target="_blank" href="#">WUB_CSE_41B_G-04</a>. All rights reserved.</strong>
    </footer>
  </div>
  <!-- jQuery 3 -->
  <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery-ui.min.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.bootstrap.js')}}"></script>
  <script src="{{asset('js/select2.js')}}"></script>
  <script src="{{asset('admin/js/admin.min.js')}}"></script>
  <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('summernote/summernote.min.js')}}"></script>
  <!-- DFMS -->

  <!-- <script src="{{url('frontend/js/jquery.min.js')}}"></script>
  <script src="{{url('frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{url('frontend/js/bootstrap-confirmation.min.js')}}"></script>

  <script src="{{url('frontend/js/jquery.slimscroll.js')}}"></script>

  <script src="{{url('frontend/js/fastclick.js')}}"></script>

  <script src="{{url('frontend/js/adminlte.js')}}"></script> -->

  <script src="{{url('frontend/js/bootstrap-datepicker.js')}}"></script>
  <link media="all" type="text/css" rel="stylesheet" href="{{url('frontend/css/datepicker3.css')}}">
  <script src="{{url('frontend/js/bootstrap-tagsinput.js')}}"></script>
  <script src="{{url('frontend/js/demo.js')}}"></script>
  <script src="{{url('frontend/js/chart.js')}}"></script>
  <script src="{{url('frontend/js/Chart.min.js')}}"></script>
  <script src="{{url('frontend/js/utils.js')}}"></script>
  <link media="all" type="text/css" rel="stylesheet" href="{{url('frontend/css/select2.min.css')}}">
  <script src="{{url('frontend/js/select2.min.js')}}"></script>
  <script src="{{url('frontend/js/notify.js')}}"></script>
  <script src="{{url('frontend/js/ion.rangeSlider.js')}}"></script>
  <link media="all" type="text/css" rel="stylesheet" href="{{url('frontend/css/ion.rangeSlider.css')}}">
  <script src="{{url('frontend/js/owl.carousel.js')}}"></script>
  <link media="all" type="text/css" rel="stylesheet" href="{{url('frontend/css/owl.carousel.css')}}">
  <script src="{{url('frontend/js/SimpleCalculadorajQuery.js')}}"></script>
  <link media="all" type="text/css" rel="stylesheet" href="{{url('frontend/css/SimpleCalculadorajQuery.css')}}">
  <script src="{{url('frontend/js/moment.js')}}"></script>
  <script src="{{url('frontend/js/ckeditor.js')}}"></script>

  <script src="{{url('frontend/js/ams.js')}}"></script>
  <script src="{{url('frontend/js/homeGraph.js')}}"></script>
  <script src="{{url('frontend/js/jquery.validate.min.js')}}"></script>

  <script>
    $(document).ready(function() {
      $('.isnumber').keypress(function(e) {
        return e.charCode === 0 || ((e.charCode >= 48 && e.charCode <= 57) || (e.charCode == 46 && $(this).val().indexOf('.') < 0));
      });

      $('.select2').select2();
      $(function() {
        $(".datepicker").datepicker({
          changeYear: true,
          changeMonth: true,
          yearRange: '1950:2050',
          dateFormat: 'yyyy-mm-dd',
          autoclose:true,
        }).datepicker("setDate", new Date());
      });
      $(function() {
        $(".datepicker2").datepicker({
          changeYear: true,
          changeMonth: true,
          yearRange: '1950:2050',
          dateFormat: 'yyyy-mm-dd',
          autoclose:true,
        });
      });
      $('.textarea').summernote({
        height: 100,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['fontsize', ['fontsize', 'fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          //['Insert', ['picture', 'link', 'table']],
        ]
      });
    });

    function sumColumnValue(index) {
      var total = 0;
      $("table #tbody td:nth-child(" + index + ")").each(function() {
        total += parseFloat($(this).find('input').val(), 10) || 0;
      });
      return total.toFixed(0);
    }
    setTimeout(function() {
      $('.alert-danger').fadeOut(2000);
    }, 5000);
  </script>
  @yield('script')
  <script>
    $("#flowcheckall").click(function() {
      $(this).closest('div').find('.name').prop('checked', this.checked);
    });
    $(document).ready(function() {

      var url = window.location.href;
      console.log(url);
      // for sidebar menu entirely but not cover treeview
      $('ul.sidebar-menu a').filter(function() {
        return this.href != url;
      }).parent().removeClass('active');

      // for sidebar menu entirely but not cover treeview
      $('ul.sidebar-menu a').filter(function() {
        return this.href == url;
      }).parent().addClass('active');

      // for treeview
      $('ul.treeview-menu a').filter(function() {
        return this.href == url;
      }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
    });



    $(function() {
      $('#datatable').DataTable()
    })
  </script>
</body>

</html>