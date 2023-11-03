<!DOCTYPE html>
<html lang="en">
<head>

     <title>PHPJabber | Car Rental Website Template</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
     <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>

          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">Car Rental Website</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-nav-first">
                     <li><a href="{{route('client_index')}}">Home</a></li>
                     <li><a href="{{route('fleet')}}">Fleet</a></li>
                     <li class="active"><a href="{{route('show_product_index')}}">Offers</a></li>
                     <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About<span class="caret"></span></a>

                          <ul class="dropdown-menu">
                            <li><a href="{{route('blog')}}">Blog</a></li>
                            <li><a href="{{route('aboutUs')}}">About Us</a></li>
                            <li><a href="{{route('team')}}">Team</a></li>
                            <li><a href="{{route('testimonials')}}">Testimonials</a></li>
                            <li><a href="{{route('terms')}}">Terms</a></li>
                       </ul>
                     </li>
                     <li><a href="{{route('client_contact')}}">Contact Us</a></li>
                     <li><a href="login.html">Login</a></li>
                </ul>
           </div>

          </div>
     </section>

     <section>
          <div class="container">
               <div class="text-center">
                    <h1>Offers</h1>

                    <br>

                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, alias.</p>
               </div>
          </div>
     </section>

     <div class="row">
        <div class="col-md-12 col-sm-12">
             <div class="section-title text-center">
                  <h2>Offers <small>Lorem ipsum dolor sit amet.</small></h2>
             </div>
        </div>
        @foreach ($new_products as $new_productses)
        <div class="col-md-4 col-sm-6">
           <div class="team-thumb">
               <div class="team-image">
                    <img src="{{asset('uploads/'.$new_productses->image)}}" class="img-responsive" alt="">
               </div>
               <div class="team-info">
                    <h3>{{$new_productses->name}}</h3>

                    <p class="lead"><small>{{number_format($new_productses->price)}} VND</small></p>

                    <span>{{$new_productses->description}}</span>
               </div>
               <div class="team-thumb-actions">
                    <a href="{{route('product_detail', ['id'=>$new_productses->id])}}" class="section-btn btn btn-primary btn-block">View Offer</a>
               </div>
          </div>
        </div>
        @endforeach
   </div>

     <section class="section-background">
          <div class="container">
            <div class="row">
                @foreach ($products as $productses)
                <div class="col-md-4 col-sm-4">
                    <div class="courses-thumb courses-thumb-secondary">
                         <div class="courses-top">
                              <div class="courses-image">
                                   <img style="object-fit: cover;" src="{{asset('uploads/'.$productses->image)}}" class="img-responsive" alt="">
                              </div>
                         </div>

                         <div class="courses-detail">
                              <h3><a href="fleet.html">{{$productses->name}}</a></h3>
                              <p class="lead"><small>{{number_format($productses->price)}} VND</small></p>
                              <p>{{$productses->description}}</p>
                         </div>

                         <div class="courses-info">
                              <button type="button" data-toggle="modal" data-target=".bs-example-modal" class="section-btn btn btn-primary btn-block">Book Now</button>
                         </div>
                    </div>
               </div>
                @endforeach
               </div>
               <div class="col-12 pb-1" style="display: flex;  justify-content: center">
                {!! $products->appends($data)->links() !!}
            </div>
          </div>
     </section>

     <!-- FOOTER -->
     <footer id="footer">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Headquarter</h2>
                              </div>
                              <address>
                                   <p>212 Barrington Court <br>New York, ABC 10001</p>
                              </address>

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>

                              <div class="copyright-text">
                                   <p>Copyright &copy; 2020 Company Name</p>
                                   <p>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Contact Info</h2>
                              </div>
                              <address>
                                   <p>+1 333 4040 5566</p>
                                   <p><a href="mailto:contact@company.com">contact@company.com</a></p>
                              </address>

                              <div class="footer_menu">
                                   <h2>Quick Links</h2>
                                   <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="terms.html">Terms & Conditions</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                         <div class="footer-info newsletter-form">
                              <div class="section-title">
                                   <h2>Newsletter Signup</h2>
                              </div>
                              <div>
                                   <div class="form-group">
                                        <form action="#" method="get">
                                             <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" required>
                                             <input type="submit" class="form-control" name="submit" id="form-submit" value="Send me">
                                        </form>
                                        <span><sup>*</sup> Please note - we do not spam your email.</span>
                                   </div>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </footer>

     <div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="gridSystemModalLabel">Book Now</h4>
                    </div>

                    <div class="modal-body">
                         <form action="#" id="contact-form">
                              <div class="row">
                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Pick-up location" required>
                                   </div>

                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Return location" required>
                                   </div>
                              </div>

                              <div class="row">
                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Pick-up date/time" required>
                                   </div>

                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Return date/time" required>
                                   </div>
                              </div>
                              <input type="text" class="form-control" placeholder="Enter full name" required>

                              <div class="row">
                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Enter email address" required>
                                   </div>

                                   <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Enter phone" required>
                                   </div>
                              </div>
                         </form>
                    </div>

                    <div class="modal-footer">
                         <button type="button" class="section-btn btn btn-primary">Book Now</button>
                    </div>
               </div>
          </div>
     </div>

     <!-- SCRIPTS -->
     <script src="{{ asset('js/jquery.js') }}"></script>
     <script src="{{ asset('js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
     <script src="{{ asset('js/smoothscroll.js') }}"></script>
     <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>
