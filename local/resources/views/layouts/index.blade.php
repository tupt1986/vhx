<!DOCTYPE html>
<head>
    <title>BƯU ĐIỆN TỈNH NGHỆ AN - Quản lý hóa đơn - ấn chỉ bảo hiểm PTI</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Web Fonts -->
    <!--<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">-->
    <link rel='stylesheet' type='text/css'
          href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>


    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{url('/')}}/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="{{url('/')}}/assets/css/headers/header-v4.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/footers/footer-v1.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{url('/')}}/assets/plugins/animate.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
<!--<link rel="stylesheet" href="{{url('/')}}/assets/plugins/flexslider/flexslider.css">-->
<!--<link rel="stylesheet" href="{{url('/')}}/assets/plugins/bxslider/jquery.bxslider.css">-->
    <link rel="stylesheet" href="{{url('/')}}/assets/plugins/fancybox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/plugins/revolution-slider/rs-plugin/css/settings.css"
          type="text/css"
          media="screen">


    <!-- CSS Pages Style -->
    <link rel="stylesheet" href="{{url('/')}}/assets/css/pages/page_one.css">
    <!-- CSS Theme -->
    <link rel="stylesheet" href="{{url('/')}}/assets/css/theme-colors/default.css" id="style_color">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/theme-skins/dark.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{url('/')}}/assets/css/custom.css">
<body>
<div class="wrapper">
    <!--=== Header ===-->
    <div div class="header-v4">
        <!-- Topbar -->
        <div class="topbar-v1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline top-v1-data">
                            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Đăng nhập</a></li>
                            @else
                                <li><a href="{{ url('/logout') }}">Thoát</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar navbar-default mega-menu" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{url('/')}}">
                                <img id="logo-header" src="{{url('/')}}/images/index.png" alt="Logo">
                            </a>
                        </div>
                        <div class="col-md-10">
                            <a href="#"><img class="header-banner img-responsive" src="{{url('/')}}/images/adds.jpg"
                                             width="1000"
                                             alt=""></a>
                        </div>
                    </div>
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-responsive-collapse">
                    </button>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li><a href="{{url("/")}}">HOME</a></li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                Báo cáo - tổng hợp
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?cat=tonghop&act=xuatkhachhang">Tổng hợp ấn chỉ xuất cho khách
                                        hàng</a></li>
                                <li><a href="index.php?cat=tonghop&act=taikhoan">Tổng hợp tình hình sử dụng ấn chỉ cá
                                        nhân</a></li>
                                <li><a href="index.php?cat=tonghop&act=giaodichcho">Tổng hợp giao dịch ấn chỉ chờ xác
                                        nhận</a></li>
                                <li><a href="index.php?cat=tonghop&act=giaodichhuy">Tổng hợp giao dịch ấn chỉ không được
                                        chấp nhận</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                Xác nhận giao dịch
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?cat=nhapxuat&act=xacnhannhap">Xác nhận nhập/chuyển hoàn ấn chỉ từ
                                        các đơn vị - cá nhân khác</a></li>
                                <li><a href="index.php?cat=nhapxuat&act=xacnhanxoa">Xác nhận Xóa bỏ - mất - hủy ấn chỉ
                                        cho đơn vị - cá nhân trực thuộc</a></li>
                            </ul>

                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-settings"></i> Thiết lập
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?cat=setting&act=viewdonvi">Quản lý đơn vị</a></li>
                                <li><a href="index.php?cat=setting&act=viewbuucuc">Quản lý Bưu Cục</a></li>
                                <li><a href="{{route('users')}}"><i class="icon-users"></i>&nbsp;&nbsp;&nbsp;Quản lý người dùng</a></li>
                            </ul>
                        </li>
                        <li>
                            <i class="search fa fa-search search-btn"></i>

                            <div class="search-open">
                                <div class="input-group animated fadeInDown">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm nhanh ấn chỉ">
                                    <span class="input-group-btn">
										<button class="btn-u" type="button">Go</button>
									</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-right">@yield('title')</h1>
        </div>
    </div>

    <div class="container">
        <!-- Nội dung trang -->
    @yield('content')

    <!-- kết thúc nội dung trang-->
    </div>
</div>

@include('flash::message')
<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/assets/plugins/back-to-top.js"></script>

<script>
    $('#flash-overlay-modal').modal();
</script>

<!------------------------------- Footer ----------------------------------------->
<div class="breadcrumbs">
    <div class="container" align="right" style="vertical-align:middle; font-size:medium">
        BƯU ĐIỆN TỈNH NGHỆ AN - Phòng Kỹ Thuật Nghiệp Vụ - COPYRIGHT 2016
        <img src="{{url('/')}}/images/137x137.png" alt="Logo">
    </div>
</div>
</body>
</html>
