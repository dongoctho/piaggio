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
                            <a class="navbar-brand" href="{{route('client_index')}}">piaggio<span></span></a>

                        </div><!--/.navbar-header-->
                        <!-- End Header Navigation -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                                <li class=""><a href="{{route('client_index')}}">Trang chủ</a></li>
                                <li class=""><a href="{{route('show_product_index')}}">Sản phẩm</a></li>
                                <li class="">
                                    <?php
                                        if (auth()->user())
                                        {
                                    ?>
                                        <a href="{{route('logout')}}" class="nav-item nav-link">Đăng Xuất</a>
                                    <?php
                                        } else {
                                    ?>
                                        <a href="{{route('login_page')}}" class="nav-item nav-link">Đăng Nhập</a>
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

        <div class="container">
            <div class="welcome-hero-txt">
                <!-- <h2>NHẬN XE MONG MUỐN VỚI GIÁ HỢP LÝ</h2>
                    <p>
                        Đây là trang chủ web Piaggio
                    </p>
                    <button class="welcome-btn" onclick="window.location.href='#'">Test</button> -->
            </div>
        </div>



    </section><!--/.welcome-hero-->


    <!-- Sản phẩm -->
    <div style="width: 100%; max-width: 1170px; margin: auto;">
        <h1>Nguyen Duc Nghia</h1>
    </div>

    <section id="new-cars" class="new-cars">
        <div class="container">
            <div class="section-header">
                <p>Kiểm tra những chiếc xe mới nhất</p>
                <h2>Mẫu mới nhất</h2>
            </div><!--/.section-header-->
            <div class="new-cars-content">
                <div class="owl-carousel owl-theme" id="new-cars-carousel">

                    @foreach ($new_products as $productses)
                    <div class="new-cars-item">
						<div class="single-new-cars-item">
							<div class="row">
								<div class="col-md-7 col-sm-12">
									<div class="new-cars-img">
										<a href="{{route('product_detail', ['id'=>$productses->id])}}"><img src="{{asset('uploads/'.$productses->image)}}" alt="img" /></a>
									</div><!--/.new-cars-img-->
								</div>
								<div class="col-md-5 col-sm-12">
									<div class="new-cars-txt">
										<h2><a href="{{route('product_detail', ['id'=>$productses->id])}}">{{ $productses->name }}</a></h2>
										<p>
											{{ $productses->description }}
										</p>
										<p class="new-cars-para2">
                                            @foreach ($categories as $category)
                                                @if ($productses->category_id == $category->id)
                                                    {{ $category->name }}
                                                @endif
                                            @endforeach
										</p>
										<button class="welcome-btn new-cars-btn" onclick="window.location.href='{{route('product_detail', ['id'=>$productses->id])}}'">
											view details
										</button>
									</div><!--/.new-cars-txt-->
								</div><!--/.col-->
							</div><!--/.row-->
						</div><!--/.single-new-cars-item-->
					</div><!--/.new-cars-item-->
                    @endforeach

                </div><!--/#new-cars-carousel-->
            </div><!--/.new-cars-content-->
        </div><!--/.container-->

    </section><!--/.new-cars-->
    <!--new-cars end -->
    <!--End Sản phẩm -->



    <!--featured-cars start -->
    <section id="featured-cars" class="featured-cars">
        <div class="container">
            <div class="section-header">
                <p>Kiểm tra những chiếc xe nổi bật</p>
                <h2>Tất cả mọi loại xe</h2>
            </div><!--/.section-header-->
            <div class="featured-cars-content">
                <div class="row">

                    @foreach ($productAll as $productAlls)
                    <div class="col-lg-3 col-md-4 col-sm-6">
						<div class="single-featured-cars">
							<div class="featured-img-box">
								<div class="featured-cars-img">
									<a href="{{route('product_detail', ['id'=>$productAlls->id])}}"><img src="{{asset('uploads/'.$productAlls->image)}}" alt="cars"></a>
								</div>
								<div class="featured-model-info">
									<p>
										model: 2017
										<span class="featured-mi-span"> 3100 mi</span>
										<span class="featured-hp-span"> 240HP</span>
										automatic
									</p>
								</div>
							</div>
							<div class="featured-cars-txt">
								<h2><a href="{{route('product_detail', ['id'=>$productAlls->id])}}">{{$productAlls->name}}</a></h2>
								@if ($productAlls->discount == 0)
                                <h3>{{number_format($productAlls->price, 0, ",", ".")}} VND</h3>
                                @elseif ($productAlls->product_type == 0)
                                <h3>{{number_format($productAlls->price, 0, ",", ".")}} VND</h3>
                                    <h3>{{number_format($productAlls->price * (1 - ($productAlls->discount / 100)), 0, ",", ".")}} VND</h3>
                                @elseif ($productAlls->product_type == 1)
                                    <h3>{{number_format($productAlls->price, 0, ",", ".")}}</h3>
                                    <div class="">
                                        <h3> {{number_format($productAlls->price - $productAlls->discount, 0, ",", ".")}}</h3>
                                    </div>
                                @endif
								<p>
									{{ $productAlls->description }}
								</p>
							</div>
						</div>
					</div>
                    @endforeach

                </div>
                <div class="col-12 pb-1" style="display: flex;  justify-content: center">
                    {!! $productAll->appends($data)->links() !!}
                </div>
            </div>
        </div><!--/.container-->

    </section><!--/.featured-cars-->
    <!--featured-cars end -->








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
                <i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title=""
                    data-original-title="Back to Top" aria-hidden="true"></i>
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
