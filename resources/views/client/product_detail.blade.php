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
                            <a class="navbar-brand" href="{{route('client_index')}}">piaggio<span></span></a>

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



    <!-- Chi tiết ản phẩm -->
    <div style="width: 100%; max-width: 1170px; margin: 50px auto;">
        <div class="container-fluid py-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 pb-5">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner border">
                            <div class="carousel-item active">
                                <img class="w-100 h-100" src="{{ asset('uploads/' . $product_detail->image) }}"
                                    alt="Image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 pb-5">
                    <form action="" method="post">
                        @csrf
                        <h1 class="font-weight-semi-bold">{{ $product_detail->name }}</h1>
                        <div class="" style="display: flex;">
                            @if ($product_detail->discount == 0)
                                <h5 style="color: rgb(78, 78, 78)">Giá:</h5>
                                <h5 class="font-weight-semi-bold" style="margin-left: 10px; color: red;">
                                    ₫{{ number_format($product_detail->price, 0, ',', '.') }}</h5>
                            @elseif ($product_detail->product_type == 0)
                                <h5 style="color: rgb(78, 78, 78)">Giá:</h5>
                                <h5 style=" color:gray; font-size:15px; margin-left: 10px"><i
                                        style="text-decoration: line-through;">₫{{ number_format($product_detail->price, 0, ',', '.') }}</i>
                                </h5>
                                <h5 style="color: red; margin-left: 10px" class="font-weight-semi-bold">
                                    ₫{{ number_format($product_detail->price * (1 - $product_detail->discount / 100), 0, ',', '.') }}
                                </h5>
                            @elseif ($product_detail->product_type == 1)
                                <h5 style="color: rgb(78, 78, 78)">Giá:</h5>
                                <h5 style=" color:gray; font-size:15px; margin-left: 10px"><i
                                        style="text-decoration: line-through;">
                                        ₫{{ number_format($product_detail->price, 0, ',', '.') }}</i></h5>
                                <div class="">
                                    <h5 style="color: red; margin-left: 10px" class="font-weight-semi-bold">
                                        ₫{{ number_format($product_detail->price - $product_detail->discount, 0, ',', '.') }}
                                    </h5>
                                </div>
                            @endif
                        </div>
                        <h5 style="color: rgb(78, 78, 78)" class="font-weight-semi mb-4">Số lượng trong kho:
                            {{ $storages->quantity }}</h5>
                        <p class="mb-4">Nhà sản xuất:
                            @if (isset($product_detail->manufacture_id))
                                {{ $product_detail->manufacture->name }}
                            @endif
                        </p>
                        <p class="mb-4">Mô tả: {{ $product_detail->description }}</p>
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <div class="input-group quantity mr-3 group-quantity" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="quantity" class="form-control bg-secondary text-center"
                                    value="1" />
                                <div class="input-group-btn group-plus">
                                    <button type="button" class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button
                                @if (Auth::check()) type="submit"
                                        href={{ route('cart_detail', ['id' => $product_detail->id]) }}
                                    @else
                                        type="button"
                                        onclick="alertCart()" @endif
                                class="btn btn-primary px-3"><svg xmlns="http://www.w3.org/2000/svg" width="26"
                                    height="26" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1h5a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg></button>
                            @if (Auth::check())
                                <a href={{ route('checkout_index') . '?productId=' . $product_detail->id }}
                                    id='btn_buy' style="margin-left: 15px" class="btn btn-primary px-3"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                        fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z" />
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                                    </svg> Mua Ngay </a>
                            @endif
                        </div>
                        <div class="">
                            @if ($errors->all())
                                <span style="color: red">{{ $errors->first('quantity') }}</span>
                            @endif
                        </div>
                        @if (Session::has('msg'))
                            <div class="">
                                <span style="color: red">{{ Session::get('msg') }}</span>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Chi tiết ản phẩm -->





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

    <script>
        $(document).ready(function() {
            var quantity = @json($storages->quantity);
            var url = $('#btn_buy').attr('href');
            $('#btn_buy').attr('href', url + '&&quantity=' + 1);
            $('.quantity button').on('click', function() {
                var button = $(this);
                var oldValue = button.parent().parent().find('input').val();
                if (button.hasClass('btn-plus')) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    if (oldValue > 1) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 1;
                    }
                }
                $('#btn_buy').attr('href', url + '&&quantity=' + newVal);
                button.parent().parent().find('input').val(newVal);
                if (newVal >= quantity) {
                    $('.btn-plus').attr("disabled", true);
                } else {
                    $('.btn-plus').attr("disabled", false);
                }
                console.log(newVal);
            });

        })

        function alertCart() {
            swal({
                    title: "Bạn muốn thực hiện hành động này?",
                    text: "Hãy đăng nhập để thực hiện!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = "{{ route('login_page') }}";
                    } else {
                        swal("Thao tác thất bại!");
                    }
                });
        }
    </script>

</body>

</html>
