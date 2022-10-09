<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TITA - ADMIN</title>

    <!-- Bootstrap core CSS -->

    <link href="{{url('TiTa/assets/css/bootstrap.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{url('TiTa/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{url('TiTa/assets/css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('TiTa/assets/js/gritter/css/jquery.gritter.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('TiTa/assets/lineicons/style.css')}}">

    <!-- Custom styles for this template -->
    <link href="{{url('TiTa/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{url('TiTa/assets/css/style-responsive.css')}}" rel="stylesheet">
    {{----}}
    <link href="{{url('TiTa/assets/js/fancybox/jquery.fancybox.css')}}" rel="stylesheet" />
    <script src="{{url('TiTa/assets/js/jquery.js')}}"></script>
    {{----}}
    <script src="{{url('TiTa/assets/js/chart-master/Chart.js')}}"></script>
    <link rel="stylesheet" href="{{url('TiTa/assets/css/to-do.css')}}">

    {{--Ckeditor và ckfinder --}}
    <script type="text/javascript" src="{{url('TiTa/js/ckeditor/ckeditor.js')}}"></script>

    <script type="text/javascript" src="{{url('TiTa/js/ckfinder/ckfinder.js')}}"></script>

    <script type="text/javascript">
        var baseURL = "{!! url('/') !!}";
    </script>

    <script type="text/javascript" src="{{url('TiTa/js/func_ckfinder.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{url('TiTa/javacripnew/demo.css')}}" />

    <link href="{{url('TiTa/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">

    {{--End Ckeditor và ckfinder --}}

</head>

<body>

<section id="container" >
    <!--header start-->
    <header class="header black-bg">
    <div class="cp-spinner cp-skeleton" id="loading">
    </div>
        <div id="page" class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="{!! route('trangchu') !!}" class="logo"><b>HAMBURGER TITA	</b></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            @include('TiTa.Trangchu.cart')

            <!--  notification end -->
        </div>
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="{{ URL::route('adminlogout') }}">Logout</a></li>
            </ul>
        </div>
    </header>
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="#"><img src="{{url('TiTa/assets/img/logo2.jpg')}}" class="img-circle" width="60"></a></p>
                <h5 class="centered">{{ Auth::user()->name }}</h5>
                <li class="mt">
                    <a class="active" href="{!! route('trangchu') !!}">
                        <i class="fa li_calendar"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa li_pen"></i>
                        <span>Danh Mục</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="{!! route('xemdanhmuc') !!}">Bảng Danh Mục</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa li_food"></i>
                        <span>Thực Đơn</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="{!! route('xemmenu') !!}">Bảng Thực Đơn</a></li>
                        <li><a  href="{!! route('xemsale') !!}">Giảm Giá</a></li>
                        <li><a  href="{!! route('search') !!}">Tìm Kiếm Thực Đơn</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa li_truck"></i>
                        <span>Đơn Hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="{!! route('xemdonhang') !!}">Bảng Đơn Hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa li_stack"></i>
                        <span>Kho Hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{!! route('xemkho') !!}">Bảng Kho Hàng</a></li>
                        <li><a href="{!! route('detail') !!}">Chi Tiết Kho</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class=" fa li_user"></i>
                        <span>Quản Lý Nhân Viên</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="{!! route('xemnhanvien') !!}">Bảng Nhân Viên</a></li>
                        <li><a  href="{!! route('searchclients') !!}">Bảng Khách Hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-th"></i>
                        <span>Dữ Liệu</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="{!! route('morris') !!}">Tất Cả Dữ Liệu</a></li>
                    </ul>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>

    </aside>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->

    <section id="main-content">
        <section class="wrapper">
            <h3>@yield('acction')</h3>
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <b>{!! Session::get('flash_message') !!}</b>.
                </div>
            @endif
            @yield('content')
        </section></section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            2018 - Tiệm bán hàng nhỏ - Hambuger TiTa.
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{url('TiTa/assets/js/jquery.js')}}"></script>
<script src="{{url('TiTa/assets/js/jquery-1.8.3.min.js')}}"></script>
<script src="{{url('TiTa/assets/js/bootstrap.min.js')}}"></script>
<script class="include" type="text/javascript" src="{{url('TiTa/assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{url('TiTa/assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{url('TiTa/assets/js/jquery.nicescroll.js" type="text/javascript')}}"></script>
<script src="{{url('TiTa/assets/js/jquery.sparkline.js')}}"></script>


<!--common script for all pages-->
<script src="{{url('TiTa/assets/js/common-scripts.js')}}"></script>

<script type="text/javascript" src="{{url('TiTa/assets/js/gritter/js/jquery.gritter.js')}}"></script>
<script type="text/javascript" src="{{url('TiTa/assets/js/gritter-conf.js')}}"></script>

<!--script for this page-->
<script src="{{url('TiTa/assets/js/sparkline-chart.js')}}"></script>
<script src="{{url('TiTa/assets/js/zabuto_calendar.js')}}"></script>

<script src="{{url('TiTa/assets/myscrip.js')}}"></script>


<script type="application/javascript"></script>

<script type="text/javascript" src="{{url('TiTa/javacripnew/js/jquery.js')}}"></script>
<script src="{{url('TiTa/assets/js/fancybox/jquery.fancybox.js')}}"></script>


<script src="{{url('TiTa/assets/js/tasks.js')}}" type="text/javascript"></script>

    <!--script for this page-->

<!--  -->

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url('TiTa/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->

    <!-- DataTables JavaScript -->
    <script src="{{url('TiTa/bower_components/DataTables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('TiTa/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

    <!--  -->
@yield('script')
</body>
</html>
