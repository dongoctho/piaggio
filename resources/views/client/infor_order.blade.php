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
                        <th scope="col">Tên người dùng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Tổng giá</th>
                        <th scope="col">Giảm giá</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thanh toán lúc</th>
                        <th scope="col">Xem chi tiết</th>
                        <th scope="col">Đặt lại</th>
                        <th scope="col">Hủy đơn hàng</th>
                        <th scope="col">Xuất hóa đơn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{number_format($order->price)}} VND</td>
                        <td>
                            @if (isset($order->voucher->name))
                                {{$order->voucher->name}}
                            @else
                                Không có phiếu giảm giá
                            @endif
                        </td>
                        <td>
                            @if ($order->status == 0)
                            Đang Chờ Xác Nhận
                            @elseif ($order->status == 1)
                            Đơn Hàng Đã Đặt
                            @elseif ($order->status == 2)
                            Đã Giao Cho ĐVVC
                            @elseif ($order->status == 3)
                            Đã Nhận Được Hàng
                            @elseif ($order->status == 4)
                            Đơn Hàng Đặt Không Thành Công
                            @endif
                        </td>
                        <td>{{$order->created_at}}</td>
                        <td><a href="{{route('infor_order_detail', ['id_user' => $order->user_id, 'id'=>$order->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg></a></td>
                        <td>
                            @if ($order->status == 4 || $order->status == 3)
                                <a class="btn btn-sm btn-primary" style="border-radius: 100%; background-color:rgb(255, 142, 170)" onclick="createOrder({{$order->id}})"><svg style="color:white" xmlns="http://www.w3.org/2000/svg" width="20" height="27" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                  </svg></a>
                            @endif
                        </td>
                        <td>
                            @if ($order->status == 0)
                                <a class="btn btn-sm btn-primary" style="border-radius: 100%; background-color:rgb(255, 80, 80)" onclick="deleteCategory({{$order->id}})"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="26" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                </svg></a>
                            @endif
                        </td>
                        <td><a href="{{route('export_pdf', ['id'=>$order->id])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                              </svg>
                        </a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12 pb-1" style="display: flex;  justify-content: center">
                {!! $orders->links() !!}
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
            title: "Bạn muốn hủy?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var url = 'infor/deleted/' + id;
                    window.location = url;
                    swal("Hủy thành công!", {
                    icon: "success",
                    });
                } else {
                    swal("Hủy Thất bại!");
                }
            });
        }

        function createOrder(id) {
            swal({
            title: "Bạn muốn đặt lại đơn hàng?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var url = 'infor/reorder/' + id;
                    window.location = url;
                } else {
                    swal("Đặt lại Thất bại!");
                }
            });
        }
    </script>

</body>

</html>
