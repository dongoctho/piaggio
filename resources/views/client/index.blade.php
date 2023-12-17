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

	<!--welcome-hero start -->
	<section id="home" class="welcome-hero">

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
								<li class=" scroll active"><a href="#home">Trang chủ</a></li>
								<li class=""><a href="{{route('show_product_index')}}">Sản phẩm</a></li>
								<!-- <li class="scroll"><a href="#service">Dịch vụ</a></li> -->
								<li class="scroll"><a href="#featured-cars">Xe nổi bật</a></li>
								<li class="scroll"><a href="#new-cars">Xe mới</a></li>
								<li class="scroll"><a href="#brand">Nhà tài trợ</a></li>
								<li class="scroll"><a href="#contact">Liên hệ</a></li>

								<li class="">
                                    <a
                                    @if (Auth::check())
                                    href={{route('show_cart')}}
                                    @else
                                        onclick="alertCart()"
                                    @endif
                                    >
                                    Giỏ hàng
                                    </a>

                                </li>
                                @if (Auth::check())
								<li class="">
                                    <a href="{{route('infor_order')}}" class="nav-item nav-link">Lịch Sử Mua Hàng</a>
                                </li>
                                @endif
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
				<h2>NHẬN XE MONG MUỐN VỚI GIÁ HỢP LÝ</h2>
				<p>
					Đây là trang chủ web Piaggio
				</p>
				<button class="welcome-btn" onclick="window.location.href='#'">Test</button>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="model-search-content">
                        <form action="{{route('show_product_index')}}" method="GET">

						<div class="row">
							<div class="col-md-offset-1 col-md-2 col-sm-12">
								<div class="single-model-search">
									<h2>Tên xe</h2>
									<div class="">
										<input type="text" name="findProductName">
									</div><!-- /.model-select-icon -->
								</div>
								<div class="single-model-search">
									<h2>Danh mục</h2>
									<div class="model-select-icon">
										<select class="form-control" name="findCategoryName">

											<option value="">Tất cả danh mục</option><!-- /.option-->
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach

										</select><!-- /.select-->
									</div><!-- /.model-select-icon -->
								</div>
							</div>
							<div class="col-md-offset-1 col-md-2 col-sm-12">
								<div class="single-model-search">
									<h2>Chọn giá</h2>
									<div class="model-select-icon">
										<select class="form-control" name="findPrice">

											<option  value="">Tất cả giá</option><!-- /.option-->

											<option value="1">0 - 100 triệu</option><!-- /.option-->
											<option value="2">100 triệu - 200 triệu</option><!-- /.option-->
											<option value="3">200 triệu trở lên</option><!-- /.option-->

										</select><!-- /.select-->
									</div><!-- /.model-select-icon -->
								</div>
							</div>
							<div class="col-md-offset-1 col-md-2 col-sm-12">


							</div>
							<div class="col-md-2 col-sm-12">
								<div class="single-model-search text-center">
									<input value="search" class="welcome-btn model-search-btn" type="submit">
								</div>
							</div>
						</div>
                    </form>

					</div>
				</div>
			</div>
		</div>

	</section><!--/.welcome-hero-->
	<!--welcome-hero end -->

	<!--service start -->
	<section id="service" class="service">
		<div class="container">
			<div class="service-content">
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="single-service-item">
							<div class="single-service-icon">
								<i class="flaticon-car"></i>
							</div>
							<h2><a href="#">Đại lý ô tô lớn nhất</a></h2>
							<p>
								Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut den fugit sed quia.
							</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="single-service-item">
							<div class="single-service-icon">
								<i class="flaticon-car-repair"></i>
							</div>
							<h2><a href="#">Sửa chữa không giới hạn</a></h2>
							<p>
								Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut den fugit sed quia.
							</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="single-service-item">
							<div class="single-service-icon">
								<i class="flaticon-car-1"></i>
							</div>
							<h2><a href="#">Hỗ trợ bảo hiểm</a></h2>
							<p>
								Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut den fugit sed quia.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.container-->

	</section><!--/.service-->
	<!--service end-->

	<!--new-cars start -->
	<section id="new-cars" class="new-cars">
		<div class="container">
			<div class="section-header">
				<p>Kiểm tra những chiếc xe mới nhất</p>
				<h2>Xe mới nhất</h2>
			</div><!--/.section-header-->
			<div class="new-cars-content">
				<div class="owl-carousel owl-theme" id="new-cars-carousel">
                    @foreach ($products as $productses)
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

	<!--featured-cars start -->
	<section id="featured-cars" class="featured-cars">
		<div class="container">
			<div class="section-header">
				<p>Kiểm tra những chiếc xe nổi bật</p>
				<h2>Xe nổi bật</h2>
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
			</div>
		</div><!--/.container-->

	</section><!--/.featured-cars-->
	<!--featured-cars end -->

	<!-- clients-say strat -->
	<section id="clients-say" class="clients-say">
		<div class="container">
			<div class="section-header">
				<h2>Khách hàng của chúng tôi nói gì</h2>
			</div><!--/.section-header-->
			<div class="row">
				<div class="owl-carousel testimonial-carousel">
					<div class="col-sm-3 col-xs-12">
						<div class="single-testimonial-box">
							<div class="testimonial-description">
								<div class="testimonial-info">
									<div class="testimonial-img">
										<img src="assets/images/clients/c1.png" alt="image of clients person" />
									</div><!--/.testimonial-img-->
								</div><!--/.testimonial-info-->
								<div class="testimonial-comment">
									<p>
										Sed ut pers unde omnis iste natus error sit voluptatem accusantium dolor laudan
										rem aperiam, eaque ipsa quae ab illo inventore verit.
									</p>
								</div><!--/.testimonial-comment-->
								<div class="testimonial-person">
									<h2><a href="#">Nguyễn Đức Nghĩa</a></h2>
									<h4>Hà Nam</h4>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-description-->
						</div><!--/.single-testimonial-box-->
					</div><!--/.col-->
					<div class="col-sm-3 col-xs-12">
						<div class="single-testimonial-box">
							<div class="testimonial-description">
								<div class="testimonial-info">
									<div class="testimonial-img">
										<img src="assets/images/clients/c2.png" alt="image of clients person" />
									</div><!--/.testimonial-img-->
								</div><!--/.testimonial-info-->
								<div class="testimonial-comment">
									<p>
										Sed ut pers unde omnis iste natus error sit voluptatem accusantium dolor laudan
										rem aperiam, eaque ipsa quae ab illo inventore verit.
									</p>
								</div><!--/.testimonial-comment-->
								<div class="testimonial-person">
									<h2><a href="#">Nguyễn Đức Nghĩa</a></h2>
									<h4>Hà Nam</h4>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-description-->
						</div><!--/.single-testimonial-box-->
					</div><!--/.col-->
					<div class="col-sm-3 col-xs-12">
						<div class="single-testimonial-box">
							<div class="testimonial-description">
								<div class="testimonial-info">
									<div class="testimonial-img">
										<img src="assets/images/clients/c3.png" alt="image of clients person" />
									</div><!--/.testimonial-img-->
								</div><!--/.testimonial-info-->
								<div class="testimonial-comment">
									<p>
										Sed ut pers unde omnis iste natus error sit voluptatem accusantium dolor laudan
										rem aperiam, eaque ipsa quae ab illo inventore verit.
									</p>
								</div><!--/.testimonial-comment-->
								<div class="testimonial-person">
									<h2><a href="#">Nguyễn Đức Nghĩa</a></h2>
									<h4>Hà Nam</h4>
								</div><!--/.testimonial-person-->
							</div><!--/.testimonial-description-->
						</div><!--/.single-testimonial-box-->
					</div><!--/.col-->
				</div><!--/.testimonial-carousel-->
			</div><!--/.row-->
		</div><!--/.container-->

	</section><!--/.clients-say-->
	<!-- clients-say end -->

	<!--brand strat -->
	<section id="brand" class="brand">
		<div class="container">
			<div class="brand-area">
				<div class="owl-carousel owl-theme brand-item">
					<div class="item">
						<a href="#">
							<img src="{{ asset('assetsPiaggio/images/brand/br1.png') }}" alt="brand-image'" />
						</a>
					</div><!--/.item-->
					<div class="item">
						<a href="#">
							<img src="{{ asset('assetsPiaggio/images/brand/br2.png') }}" alt="brand-image'" />
						</a>
					</div><!--/.item-->
					<div class="item">
						<a href="#">
							<img src="{{ asset('assetsPiaggio/images/brand/br3.png') }}" alt="brand-image'" />
						</a>
					</div><!--/.item-->
					<div class="item">
						<a href="#">
							<img src="{{ asset('assetsPiaggio/images/brand/br4.png') }}" alt="brand-image'" />
						</a>
					</div><!--/.item-->

					<div class="item">
						<a href="#">
							<img src="{{ asset('assetsPiaggio/images/brand/br5.png') }}" alt="brand-image'" />
						</a>
					</div><!--/.item-->

					<div class="item">
						<a href="#">
							<img src="{{ asset('assetsPiaggio/images/brand/br6.png') }}" alt="brand-image'" />
						</a>
					</div><!--/.item-->
				</div><!--/.owl-carousel-->
			</div><!--/.clients-area-->

		</div><!--/.container-->

	</section><!--/brand-->
	<!--brand end -->

	<!--blog start -->
	<section id="blog" class="blog"></section><!--/.blog-->
	<!--blog end -->

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
							&copy; designed and developed by <a
								href="#">Nguyen Duc Nghia</a>.
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
