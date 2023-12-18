<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="{{ asset('fontsLogin/material-icon/css/material-design-iconic-font.min.css') }}">

    <link rel="stylesheet" href="{{ asset('cssLogin/style.css') }}">
    <meta name="robots" content="noindex, follow">
    <script nonce="be5e52e8-cacc-449d-a9d6-a7675fc4c683">
        (function (w, d) {
            ! function (bb, bc, bd, be) {
                bb[bd] = bb[bd] || {};
                bb[bd].executed = [];
                bb.zaraz = {
                    deferred: [],
                    listeners: []
                };
                bb.zaraz.q = [];
                bb.zaraz._f = function (bf) {
                    return async function () {
                        var bg = Array.prototype.slice.call(arguments);
                        bb.zaraz.q.push({
                            m: bf,
                            a: bg
                        })
                    }
                };
                for (const bh of ["track", "set", "debug"]) bb.zaraz[bh] = bb.zaraz._f(bh);
                bb.zaraz.init = () => {
                    var bi = bc.getElementsByTagName(be)[0],
                        bj = bc.createElement(be),
                        bk = bc.getElementsByTagName("title")[0];
                    bk && (bb[bd].t = bc.getElementsByTagName("title")[0].text);
                    bb[bd].x = Math.random();
                    bb[bd].w = bb.screen.width;
                    bb[bd].h = bb.screen.height;
                    bb[bd].j = bb.innerHeight;
                    bb[bd].e = bb.innerWidth;
                    bb[bd].l = bb.location.href;
                    bb[bd].r = bc.referrer;
                    bb[bd].k = bb.screen.colorDepth;
                    bb[bd].n = bc.characterSet;
                    bb[bd].o = (new Date).getTimezoneOffset();
                    if (bb.dataLayer)
                        for (const bo of Object.entries(Object.entries(dataLayer).reduce(((bp, bq) => ({
                            ...bp[1],
                            ...bq[1]
                        })), {}))) zaraz.set(bo[0], bo[1], {
                            scope: "page"
                        });
                    bb[bd].q = [];
                    for (; bb.zaraz.q.length;) {
                        const br = bb.zaraz.q.shift();
                        bb[bd].q.push(br)
                    }
                    bj.defer = !0;
                    for (const bs of [localStorage, sessionStorage]) Object.keys(bs || {}).filter((bu => bu.startsWith("_zaraz_"))).forEach((bt => {
                        try {
                            bb[bd]["z_" + bt.slice(7)] = JSON.parse(bs.getItem(bt))
                        } catch {
                            bb[bd]["z_" + bt.slice(7)] = bs.getItem(bt)
                        }
                    }));
                    bj.referrerPolicy = "origin";
                    bj.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bb[bd])));
                    bi.parentNode.insertBefore(bj, bi)
                };
                ["complete", "interactive"].includes(bc.readyState) ? zaraz.init() : bb.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body>
    <div class="main">
        <section class="sign-in" style="margin-bottom: 0px;">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('imagesLogin/signin-image.jpg') }}" alt="sing up image"></figure>
                        <a href="{{route('register')}}" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Đăng nhập</h2>
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <input name="email"
                                    class="form-control form-control-user"
                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Nhập địa chỉ email"
                                    value="{{old('email')}}"
                                    >
                                    @if ($errors->all())
                                    <p style="color: red">{{$errors->first('email')}}</p>
                                    @endif
                            </div>
                            <div class="form-group">
                                <input type="password" name="password"
                                    class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Nhập mật khẩu"
                                    >
                                    @if ($errors->all())
                                    <p style="color: red">{{$errors->first('password')}}</p>
                                    @endif
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                            @if ($errors->all())
                                <script>
                                    swal({
                                        title: "Lỗi đăng nhập !",
                                        text: "Hãy thực hiện lại",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                        })
                                </script>
                            @endif
                            @if (Session::has('msg'))
                                <script>
                                    swal({
                                        title: "{{Session::get('msg')}}",
                                        buttons: true,
                                        })
                                </script>
                            @endif
                            <hr>
                            <a href="{{route('login_google')}}" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Đăng nhập bằng google
                            </a>
                            <br>
                            <a href="{{route('forgot_password')}}" class="btn btn-google btn-user btn-block">Quên mật khẩu</a>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('vendorLogin/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('jsLogin/main.js') }}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"82050a405ada4655","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"></script>
</body>

</html>
