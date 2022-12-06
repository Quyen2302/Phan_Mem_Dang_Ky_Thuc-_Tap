

{{--@endsection--}}


{{--@section('script')--}}
{{--    <script src="{{ asset('modules/quanlyvanban/js/app.js') }}"></script>--}}
{{--    <script type="text/javascript">--}}
{{--        function showModal() {--}}
{{--            $("#myModal").modal('show');--}}
{{--        }--}}
{{--    </script>--}}
{{--@endsection--}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page_title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('theme/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ url('theme/dist/css/skins/_all-skins.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ url('theme/plugins/iCheck/all.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- toastr -->
    <link rel="stylesheet" href="{{ url('theme/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="icon" href="{{ asset('images/ha_noi.png') }}" type="image/x-icon">
    <link href="{{ url('theme/plugins/loadingModal/css/jquery.loadingModal.css')}}" rel="stylesheet" />
    <link href="{{ url('theme/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet" />
    <link href="{{ url('theme/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="{{ url('theme/bower_components/morris.js/morris.css') }}" rel="stylesheet" />
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ url('theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    {{--    <script type="text/javascript" src="{{ url('editor/ckeditor/ckeditor.js') }}"></script>--}}
    {{--    <script type="text/javascript" src="{{ url('ckfinder/ckfinder.js') }}"></script>--}}
    <script type="text/javascript" src="{{ url('ckeditor/ckeditor.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/jquery-treegrid@0.3.0/css/jquery.treegrid.css" rel="stylesheet">
    <link href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css')
    <style>
        *{
            font-size: 12px !important;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
{{--<body class="hold-transition skin-blue sidebar-mini">--}}
<body class="skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">

    <header class="main-header">
        <a href="#" class="sidebar-toggle sidebar-customize" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle sidebar-mobile" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <a href="/" class="logo-customize">
                <img src="{{ asset('logo.webp') }}" alt="" class="brand-logo">
                <div class="logo-text">
                    <span class="above-text lg-text text-uppercase">{{ TITLE_APP }}</span>
                    <span class="text-uppercase">HỆ THỐNG QUẢN LÝ SINH VIÊN THỰC TẬP</span>
                </div>
            </a>

            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
            </div>
        </nav>
    </header>



<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title" style="font-size: 16px !important;">Đăng ký thực tập tại công ty HHVH Store</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="col-md-12 mt-1 ">

                            <div class="col-md-6">
                                <div class="row">

                                </div>

                            </div>



                        </div>




                        <div class="box-body" >
                            <form action="{{route('dang-ky.store')}}" method="post">
                                @csrf
                                <div class="row form-group mt-2">
                                    <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                        <label class="form-label">Họ tên sinh viên <span style="color: red">(*)</span> :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                        <input name="ten_sinh_vien" type="text" id="noi_gui" placeholder="Vũ Văn A" class="form-control" required>

                                    </div>

                                </div>
                                <div class="row form-group mt-2">
                                    <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                        <label class="form-label">Mã sinh viên <span style="color: red">(*)</span> :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                        <input name="ma_sinh_vien" placeholder="Mã sinh viên .." type="text" id="noi_gui" class="form-control" required>

                                    </div>

                                </div>
                                <div class="row form-group mt-2">
                                    <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                        <label class="form-label">Ngày sinh <span style="color: red">(*)</span> :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                        <div class="input-group date">
                                            <input type="text" class="form-control  datepicker"
                                                   name="ngay_sinh" id="start_date" value=""
                                                   placeholder="dd/mm/yyyy" >
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"></i>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="row form-group mt-2">
                                    <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                        <label class="form-label">Lớp <span style="color: red">(*)</span> :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                        <input name="lop" type="text" placeholder="Lớp" id="noi_gui" class="form-control" required>

                                    </div>

                                </div>
                                <div class="row form-group mt-2">
                                    <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                        <label class="form-label">Khoa <span style="color: red">(*)</span> :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                        <input name="khoa" type="text" id="noi_gui" placeholder="Khoa" class="form-control" required>
                                    </div>

                                </div>
                                <div class="row form-group mt-2">
                                    <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                        <label class="form-label">Email <span style="color: red">(*)</span> :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                        <input name="email" type="text" id="email" placeholder="Email nhận thông tin kết quả từ doanh nghiệp" class="form-control" required>
                                    </div>

                                </div>
                                <div class="row form-group mt-2">
                                    <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                        <label class="form-label">Địa chỉ liên hệ <span style="color: red">(*)</span> :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                        <input name="dia_chi" type="text" id="noi_gui" placeholder="Địa chỉ liên hệ" class="form-control" required>
                                    </div>

                                </div>
                                <div class="row form-group mt-2">
                                    <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                        <label class="form-label">Số điện thoại <span style="color: red">(*)</span> :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                        <input name="so_dien_thoai" type="text" placeholder="Số điện thoại" id="noi_gui" class="form-control" required>
                                    </div>

                                </div>
                                <div class="row form-group mt-2">
                                    <div class="col-lg-4 col-md-4 col-xs-4 col-maggin-bot">
                                        <label class="form-label">Ý kiến  :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-xs-8 col-maggin-bot">
                                        <input name="y_kien" type="text" placeholder="Ý kiến" id="noi_gui" class="form-control" >
                                    </div>

                                </div>
                                <div class="row form-group mt-2">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-maggin-bot text-right">
                                        <i style="color: red"> <span >*</span> ( Lưu ý:Bạn cần nhập đúng thông tin để cấp tài khoản ! )</i>
                                    </div>


                                </div>
                                <div class="row form-group mt-2">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-maggin-bot text-center">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-check-square-o"></i> Gửi thông tin</button>
                                    </div>


                                </div>






                            </form>
                        </div>
                        <!-- /.box-body -->




                    </div>
                </div>
            </div>
        </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('admin::layouts.components.footer')

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="{{ url('theme/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('theme/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('theme/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('theme/dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('theme/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script src="{{ url('theme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ url('theme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ url('theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('theme/bower_components/chart.js/Chart.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('theme/dist/js/demo.js') }}"></script>
<script src="{{ url('theme/plugins/toastr/toastr.min.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ url('theme/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ url('theme/dist/js/pages/charts/loader.js') }}"></script>
<!-- Select2 -->
<script src="{{ url('theme/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{url('theme/plugins/loadingModal/js/jquery.loadingModal.js')}}"></script>
<script src="{{url('theme/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!---moment js-->
<script src="{{ url('theme/bower_components/moment/min/moment.min.js') }}"></script>
<!-- Morris Chart js-->
<script src="{{ url('theme/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ url('theme/bower_components/morris.js/morris.min.js') }}"></script>
<!--chart js-->
<script src="{{ url('theme/plugins/chartjs/Chart.bundle.js') }}"></script>

<script src="{{ url('theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('theme/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    window.flashMessages = [];

    @if ($message = session('success'))
    toastr.success("{{ $message }}");

    @elseif ($message = session('warning'))
    toastr.warning("{{ $message }}");

    @elseif ($message = session('error'))
    toastr.error("{{ $message }}");

    @elseif ($message = session('info'))
    toastr.info("{{ $message }}");
    @endif

        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    // $('textarea.my-editor').ckeditor(options);
</script>
<script src="{{ url('js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-treegrid@0.3.0/js/jquery.treegrid.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/treegrid/bootstrap-table-treegrid.min.js"></script>

@yield('script')
</body>
</html>
