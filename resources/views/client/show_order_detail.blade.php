<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!--font-family-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- title of site -->
    <title>CarVilla</title>

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="{{ asset('assetsPiaggio/logo/favicon.png') }}" />

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="{{ asset('assetsPiaggio/css/font-awesome.min.css') }}">

    <!--linear icon css-->
    <link rel="stylesheet" href="{{ asset('assetsPiaggio/css/linearicons.css') }}">

    <!--flaticon.css-->
    <link rel="stylesheet" href="{{ asset('assetsPiaggio/css/flaticon.css') }}">

    <!--animate.css-->
    <link rel="stylesheet" href="{{ asset('assetsPiaggio/css/animate.css') }}">

    <!--owl.carousel.css-->
    <link rel="stylesheet" href="{{ asset('assetsPiaggio/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsPiaggio/css/owl.theme.default.min.css') }}">

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="{{ asset('assetsPiaggio/css/bootstrap.min.css') }}">

    <!-- bootsnav -->
    <link rel="stylesheet" href="{{ asset('assetsPiaggio/css/bootsnav.css') }}">

    <!--style.css-->
    <link rel="stylesheet" href="{{ asset('assetsPiaggio/css/style.css') }}">

    <!--responsive.css-->
    <link rel="stylesheet" href="{{ asset('assetsPiaggio/css/responsive.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <section id="home" class="welcome-hero" style="background: #2a2d54; height: 100%; max-height: 120px;">

        <!-- top-area Start -->
        <div class="top-area">
            <div class="header-area">
                <!-- Start Navigation -->
                <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"
                    data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

                    <div class="container">

                        <!-- Start Header Navigation -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="index.html">piaggio<span></span></a>

                        </div><!--/.navbar-header-->
                        <!-- End Header Navigation -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                                <li class=""><a href="{{ route('client_index') }}">Trang chủ</a></li>
                                <li class=""><a href="{{ route('show_product_index') }}">Sản phẩm</a></li>
                                <li class="">
                                    <?php
                                        if (auth()->user())
                                        {
                                    ?>
                                    <a href="{{ route('logout') }}" class="nav-item nav-link">Đăng Xuất</a>
                                    <?php
                                        } else {
                                    ?>
                                    <a href="{{ route('login_page') }}" class="nav-item nav-link">Đăng Nhập</a>
                                    <?php
                                        }
                                    ?>
                                </li>

                            </ul><!--/.nav -->
                        </div><!-- /.navbar-collapse -->
                    </div><!--/.container-->
                </nav><!--/nav-->
                <!-- End Navigation -->
            </div><!--/.header-area-->
            <div class="clearfix"></div>

        </div><!-- /.top-area-->
        <!-- top-area End -->

        <div class="container" style="height: 114px">

        </div>


    </section><!--/.welcome-hero-->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table  style="text-align: center" id="example1" class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tổng giá</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order_details as $key => $order_detail)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$order_detail->name}}</td>
                        <td>
                        {{number_format($order_detail->price)}} VND
                        </td>
                        <td>{{$order_detail->quantity}}</td>
                        <td><img src="{{asset('uploads/'.$order_detail->image)}}" width="50px" height="35px" alt="error"></td>
                        <td>
                            {{number_format($order_detail->quantity * $order_detail->price)}} VND
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="justify" style="margin: 10px; text-align: center; margin-top: 40px;">
                    @if (isset($order->voucher_id))
                        <p style="color: rgb(255, 54, 54); font-size:20px">Phiếu giảm giá: {{$order->voucher->name}}</p>
                        @endif
                    <h3>Tổng Tiền: {{number_format($sumPrice)}} VND</h3>
                </div>

                <div class="justify" style="margin: 10px; display:flex; justify-content: center; flex-direction: column; margin-top: 40px;">
                    <a style="font-size: 25px" class="btn btn-primary btn-user btn-block" href="{{route('infor_order')}}">Trở Về</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


   <!--contact start-->
   <footer id="contact" class="contact">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-logo">
                            <a href="index.html">Piaggio</a>
                        </div>
                        <p>
                            Nhưng lúc đó tôi rơi vào đau đớn và lao động nặng nề. Trong những năm qua, tôi sẽ đến.
                        </p>
                        <div class="footer-contact">
                            <p>nghia5141@gmail.com</p>
                            <p>+84 948766582</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="single-footer-widget">
                        <h2>Về web</h2>
                        <ul>
                            <li><a href="#">about us</a></li>
                            <li><a href="#">career</a></li>
                            <li><a href="#">terms <span> of service</span></a></li>
                            <li><a href="#">privacy policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="single-footer-widget">
                        <h2>Nhãn hiệu hàng đầu</h2>
                        <div class="row">
                            <div class="col-md-7 col-xs-6">
                                <ul>
                                    <li><a href="#">Piaggio</a></li>
                                    <li><a href="#">Piaggio</a></li>
                                    <li><a href="#">Piaggio</a></li>
                                    <li><a href="#">Piaggio</a></li>
                                    <li><a href="#">Piaggio</a></li>
                                    <li><a href="#">Piaggio</a></li>
                                </ul>
                            </div>
                            <div class="col-md-5 col-xs-6">
                                <ul>
                                    <li><a href="#">Piaggio</a></li>
                                    <li><a href="#">Piaggio</a></li>
                                    <li><a href="#">Piaggio</a></li>
                                    <li><a href="#">Piaggio</a></li>
                                    <li><a href="#">Piaggio</a></li>
                                    <li><a href="#">Piaggio</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-offset-1 col-md-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h2>Gửi phản hồi</h2>
                        <div class="footer-newsletter">
                            <p>
                                Đăng ký để cập nhật tin tức và thông tin mới nhất
                            </p>
                        </div>
                        <div class="hm-foot-email">
                            <div class="foot-email-box">
                                <input type="text" class="form-control" placeholder="Nhập Email">
                            </div><!--/.foot-email-box-->
                            <div class="foot-email-subscribe">
                                <span><i class="fa fa-arrow-right"></i></span>
                            </div><!--/.foot-email-icon-->
                        </div><!--/.hm-foot-email-->
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="row">
                <div class="col-sm-6">
                    <p>
                        &copy; designed and developed by <a href="#">Nguyen Duc Nghia</a>.
                    </p><!--/p-->
                </div>
                <div class="col-sm-6">
                    <div class="footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div><!--/.footer-copyright-->
    </div><!--/.container-->

    <div id="scroll-Top">
        <div class="return-to-top">
            <i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top"
                title="" data-original-title="Back to Top" aria-hidden="true"></i>
        </div>

    </div><!--/.scroll-Top-->

</footer><!--/.contact-->
<!--contact end-->

<!-- Include all js compiled plugins (below), or include individual files as needed -->

<script src="{{ asset('assetsPiaggio/js/jquery.js') }}"></script>

<!--modernizr.min.js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<!--bootstrap.min.js-->
<script src="{{ asset('assetsPiaggio/js/bootstrap.min.js') }}"></script>

<!-- bootsnav js -->
<script src="{{ asset('assetsPiaggio/js/bootsnav.js') }}"></script>

<!--owl.carousel.js-->
<script src="{{ asset('assetsPiaggio/js/owl.carousel.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!--Custom JS-->
<script src="{{ asset('assetsPiaggio/js/custom.js') }}"></script>

</body>

</html>
