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

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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



    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <form action="{{route('payment')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông Tin Khách Hàng</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Họ Và Tên</label>
                            <input class="form-control" name="name" value="{{Auth::user()->name}}" type="text">
                            <div class="" style="">
                                @if ($errors->all())
                                <p style="color: red">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số Điện Thoại</label>
                            <input class="form-control" value="{{old('phone')}}" type="text" name="phone" placeholder="Số Điện Thoại...">
                            <div class="" style="">
                                @if ($errors->all())
                                <p style="color: red">{{$errors->first('phone')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Quốc Gia</label>
                            <input class="form-control" value="{{old('country')}}" type="text" name="country" placeholder="Quốc Gia...">
                            <div class="" style="">
                                @if ($errors->all())
                                <p style="color: red">{{$errors->first('country')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Tỉnh/Thành Phố</label>
                            <input class="form-control" value="{{old('city')}}" type="text" name="city" placeholder="Tỉnh/Thành Phố...">
                            <div class="" style="">
                                @if ($errors->all())
                                <p style="color: red">{{$errors->first('city')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Xã/Phường</label>
                            <input class="form-control" value="{{old('ward')}}" type="text" name="ward" placeholder="Xã/Phường...">
                            <div class="" style="">
                                @if ($errors->all())
                                <p style="color: red">{{$errors->first('ward')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số Nhà</label>
                            <input class="form-control" value="{{old('homenumber')}}" type="text" name="homenumber" placeholder="Số Nhà...">
                            <div class="" style="">
                                @if ($errors->all())
                                <p style="color: red">{{$errors->first('homenumber')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Thông Tin Đơn Hàng</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered text-center mb-0">
                            <thead class="bg-secondary text-dark">
                                <tr>
                                    <th>Sản Phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn Giá</th>
                                    <th>Tổng Giá</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                @foreach ($cartDetails as $cartDetail)
                                <tr>
                                    <td class="align-middle">{{$cartDetail->product_name}}</td>
                                    <td class="align-middle">{{$cartDetail->quantity}}</td>
                                    <td class="align-middle">
                                        @if ( $cartDetail->product_type == 0 )
                                            {{number_format($cartDetail->cart_price * (1 - ($cartDetail->discount / 100)))}} VND
                                        @elseif ( $cartDetail->product_type == 1 )
                                            {{number_format($cartDetail->cart_price - $cartDetail->discount)}} VND
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if ( $cartDetail->product_type == 0 )
                                            {{number_format($cartDetail->quantity * ($cartDetail->cart_price * (1 - ($cartDetail->discount / 100))))}} VND
                                        @elseif ( $cartDetail->product_type == 1 )
                                            {{number_format($cartDetail->quantity * ($cartDetail->cart_price - $cartDetail->discount))}} VND
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr class="mt-0">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0" style="border-bottom: 1px gray solid; padding-bottom: 20px">Phiếu Giảm Giá</h4>
                        </div>
                        <table class="table table-bordered text-center mb-0">
                            <select style="height:50px" id="selectBox" name="voucher_id" class="form-control voucher-select" aria-label="Username" aria-describedby="addon-wrapping">
                                    <option selected>---</option>
                                    @foreach ($vouchers as $voucher)
                                        <option value="{{$voucher->voucher_type}}-{{$voucher->discount}}-{{$voucher->id}}">{{$voucher->name}}</option>
                                    @endforeach
                            </select>
                        </table>
                    </div>
                    <input value="{{$product_id}}" name="product_id" type="text" hidden>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng tiền</h5>
                            <span style="font-weight:bold; font-size: 20px" id="sumPrice">{{number_format($sumPrice, 0, ",", ".")}} VND</span>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Thanh Toán</h4>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" name="action" value="offline" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Thanh Toán Bằng Tiền Mặt</button>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" name="action" value="online" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Thanh toán online</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- Checkout End -->


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
        $(document).ready(function () {

            $('#selectBox').on('change', function () {
                var sum = @json($sumPrice);
                var voucher = $(this).val();
                var voucherDetail = voucher.split('-');
                var priceHandle = 0;

                if (voucherDetail[0] == 0) {
                    priceHandle = sum * (1 - (voucherDetail[1] / 100));
                }
                if (voucherDetail[0] == 1) {
                    priceHandle = sum - voucherDetail[1];
                    if (priceHandle < 0) {
                        priceHandle = 0;
                    }
                }
                $('#price').attr('value', priceHandle);
                var priceFormat = priceHandle.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                $('#sumPrice').text(priceFormat);
            })
        })



        function alertCart(){
            swal({
            title: "Bạn muốn thực hiện hành động này?",
            text: "Hãy đăng nhập để thực hiện!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location.href = "{{route('login_page')}}";
            } else {
                swal("Thao tác thất bại!");
            }
            });
        }
    </script>

</body>

</html>
