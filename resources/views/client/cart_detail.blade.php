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
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng giá</th>
                            <th>Xóa Sản Phẩm</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($cartDetails as $cartDetail)
                        <tr>
                            <td class="align-middle"><img src="{{asset('uploads/'.$cartDetail->image)}}" alt="" style="width: 50px;"></td>
                            <td id="priceProduct" value="{{$cartDetail->price}}" class="align-middle">
                                @if ( $cartDetail->product_type == 0 )
                                    {{number_format($cartDetail->price * (1 - ($cartDetail->discount / 100)))}} VND
                                @elseif ( $cartDetail->product_type == 1 )
                                    {{number_format($cartDetail->price - $cartDetail->discount)}} VND
                                @endif
                            </td>

                            <td class="align-middle">
                                <div class="input-group quantity mr-3 group-quantity" style="width: 130px;">
                                    <div class="input-group-btn">
                                        <button type="button"
                                                onclick="changePrice({{$cartDetail->id}}, {{$cartDetail->product_id}}, {{$cartDetail->storage_quantity}}, {{$buttonMinus}})"
                                                class="btn btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="quantity" id="cart-quantity-{{$cartDetail->id}}" class="form-control bg-secondary text-center" value="{{$cartDetail->quantity}}" />
                                    <div class="input-group-btn group-plus">
                                        <button type="button"
                                                onclick="changePrice({{$cartDetail->id}}, {{$cartDetail->product_id}}, {{$cartDetail->storage_quantity}}, {{$buttonPlus}})"
                                                class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle" id="cart-item-{{$cartDetail->id}}">
                                @if ( $cartDetail->product_type == 0 )
                                    {{number_format($cartDetail->quantity * ($cartDetail->price * (1 - ($cartDetail->discount / 100))))}} VND
                                @elseif ( $cartDetail->product_type == 1 )
                                    {{number_format($cartDetail->quantity * ($cartDetail->price - $cartDetail->discount))}} VND
                                @endif
                            </td>
                            <td class="align-middle"><a onclick="deleteCategory({{$cartDetail->id}})" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tổng Giá Giỏ Hàng</h4>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng Tiền</h5>
                            <h5 class="font-weight-bold" id="sum">{{number_format($sumPrice, 0, ",", ".")}} VND</h5>
                        </div>
                        <a href="{{route('checkout_index')}}" class="btn btn-block btn-primary my-3 py-3">Thanh Toán</a>
                    </div>
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

    <script>
        function deleteCategory(id) {
            swal({
            title: "Bạn muốn xóa?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                var url = 'cartDetail/deleted/' + id;
                window.location = url;
                swal("Xóa thành công!", {
                icon: "success",
                });
            } else {
                swal("Xóa Thất bại!");
            }
            });
        }
       function changePrice(id, pruductId, storageQuantity, btnType) {
        var oldValue = $('#cart-quantity-'+id).val();
        var newValue = 0;
            if (btnType == 1) {
                if (newValue < storageQuantity) {
                    newValue = parseFloat(oldValue) + 1;
                } else {
                    newValue = storageQuantity;
                }
            } else {
                if (oldValue > 1) {
                    newValue = parseFloat(oldValue) - 1;
                } else {
                    newValue = 1;
                }
            }
            $('#cart-quantity-'+id).val(newValue);
            var quantity = $('#cart-quantity-'+id).val();
            $.ajax({
                url: '{{route('channge_price')}}',
                type: 'GET',
                data: {
                    'id':id,
                    'productId':pruductId,
                    'quantity':quantity
                }
            }).done(function(data) {
                setTimeout(function() {
                    location.reload();
                }, 10);
                var priceFormat = data.priceItem.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                var sumFormat = data.sum.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                $('#cart-item-'+data.cartId).text(priceFormat);
                $('#sum').text(sumFormat);

            });
       }
    </script>

</body>

</html>
