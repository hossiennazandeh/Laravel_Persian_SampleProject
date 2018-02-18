<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/admin/apple-icon.png') }}"/>
    <link rel="icon" type="image/png" href="{{ asset('img/admin/favicon.png') }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>یافت نشد | خطای 404</title>
    <!-- Canonical SEO -->
    <link rel="canonical" href="#"/>
    <!--  Social tags      -->
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/admin/material-dashboard.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/admin/demo.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/admin/customs.css') }}" rel="stylesheet"/>

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
    <div class="full-page login-page" filter-color="black" data-image="{{asset('img/back404.jpg')}}">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content not-found">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <form method="#" action="#">
                            <div class="card card-login card-hidden">
                                <div class="card-header text-center" data-background-color="red">
                                    <h1 class="card-title"> یافت نشد <span> 🙁 </span></h1>

                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-9 pull-right">

                                            <p>با عرض پوزش، اما صفحه ای که سعی در مشاهده ی آن کردید وجود ندارد.</p>
                                            <p>علت این خطا یکی از دلایل زیر می تواند باشد :</p>
                                            <ul>
                                                <li>تایپ آدرس اشتباه</li>
                                                <li>یک لینک منقضی شده</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 pull-right">
                                            <img src="{{ asset('img/admin/question.png') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <a href="/user/home" class="btn btn-rose btn-simple btn-wd btn-lg">
                                        برو به صفحه اصلی
                                    </a>
                                </div>
                            </div>
                        </form>
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
</body>
<script src="{{asset('dist/js/jquery-3.min.js')}}" type="text/javascript"></script>
{{--<script src="{{asset('dist/js/bootstrap.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{asset('dist/js/jquery.nicescroll.min.js')}}"></script>--}}
{{--<script src="{{asset('dist/js/sweetalert.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{asset('dist/js/js-cookie.js')}}"></script>--}}

{{--<script src="{{asset('js/admin/material.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{asset('js/admin/material-dashboard.js')}}"></script>--}}
<script src="{{asset('js/admin/demo.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        demo.checkFullPageBackgroundImage();
        setTimeout(function () {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>