<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/admin/apple-icon.png') }}"/>
    <link rel="icon" type="image/png" href="{{ asset('img/admin/favicon.png') }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>ورود</title>
    <!-- Canonical SEO -->
    <link rel="canonical" href="#"/>
    <!--  Social tags      -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/admin/material-dashboard.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/admin/demo.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/admin/customs.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/sweetalert.css') }}" rel="stylesheet"/>
    <link href="{{asset('dist/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/flaticon.css')}}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header navbar-right">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"><img src="{{ asset('img/user/logo.png') }}"></a>
        </div>

    </div>
</nav>
<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" filter-color="black" data-image="{{ asset('img/admin/back-login-0.jpg') }}">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <div class="card card-login card-hidden">
                            <div class="card-header text-center" data-background-color="rose">
                                <h4 class="card-title">ورود</h4>
                                <div class="social-line">
                                    <a class="btn btn-just-icon btn-simple">
                                        <i class="fa fa-star"></i>
                                        <div class="ripple-container"></div>
                                    </a>
                                    <a class="btn btn-just-icon btn-simple">
                                        <i class="fa fa-star"></i>
                                    </a>
                                    <a class="btn btn-just-icon btn-simple">
                                        <i class="fa fa-star"></i>
                                    </a>
                                </div>
                            </div>
                            <p class="category text-center">
                                فیلد های زیر را پر کنید
                            </p>
                            <div class="card-content">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="flaticon-user-silhouette"></i>
                                            </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">نام کاربری</label>
                                        <input name="username" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="flaticon-house-key"></i>
                                            </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">کلمه عبور</label>
                                        <input name="password" type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button name="login" class="btn btn-rose btn-wd btn-lg">ورود</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <nav class="pull-right">
                    <ul>
                        <li>
                            <a href="/admin/home">
                                خانه
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                شرکت
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                وبلاگ
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-left">
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <i class="flaticon-copyright-infringement"></i>
                    <a href="#">شرکت رایان آیریک </a>, ساخته شده با عشق برای یک وب سایت بهتر
                </p>
            </div>
        </footer>
    </div>
</div>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
            <li class="header-title">سبک زمینه</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>تصویر پس زمینه</p>
                    <div class="togglebutton switch-sidebar-image">
                        <label>
                            <input type="checkbox" checked="">
                        </label>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                    <p>فیلتر ها</p>
                    <div class="badge-colors pull-right">
                        <span class="badge filter active" data-color="black"></span>
                        <span class="badge filter badge-blue" data-color="blue"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple" data-color="purple"></span>
                        <span class="badge filter badge-rose" data-color="rose"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">تصاویر پس زمینه</li>
            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{ asset('img/admin/back-login-1.jpg') }}"
                         data-src="{{ asset('img/admin/back-login-1.jpg') }}" alt=""/>
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{ asset('img/admin/back-login-2.jpg') }}"
                         data-src="{{ asset('img/admin/back-login-2.jpg') }}" alt=""/>
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{ asset('img/admin/back-login-3.jpg') }}"
                         data-src="{{ asset('img/admin/back-login-3.jpg') }}" alt=""/>
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{ asset('img/admin/back-login-4.jpg') }}"
                         data-src="{{ asset('img/admin/back-login-4.jpg') }}" alt=""/>
                </a>
            </li>
            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/material-dashboard" target="_blank"
                       class="btn btn-info btn-block">اعمال تغییرات</a>
                </div>
            </li>

        </ul>
    </div>
</div>
</body>
<script src="{{asset('dist/js/jquery-3.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dist/js/bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('dist/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('dist/js/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dist/js/js-cookie.js')}}"></script>

<script src="{{asset('js/admin/material.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/admin/material-dashboard.js')}}"></script>
<script src="{{asset('js/admin/demo.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        demo.checkFullPageBackgroundImage();
        setTimeout(function () {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700);
        $('input[name="password"]').keydown(function (event) {
            if(event.keyCode == 13) {
                $('button[name="login"]').click();
            }
        });
        $('button[name="login"]').click(function () {
            var data = {};
            data.username = $('input[name="username"]').val();
            data.password = $('input[name="password"]').val();
            data._token = "{{csrf_token()}}";
            $.ajax({
                url: "/admin/login/post",
                type: "POST",
                data: data,
                success: function (response) {
                    if (response['status']) {
                        var url =  response['url'];
                        window.location.href =url
                    }else {
                        swal("لغو شد!", response['msg'], "error");
                    }

                },
                error: function () {
                    alert("Error.........")
                },
                complete: function () {
                }
            });
        })
    });
</script>

</html>