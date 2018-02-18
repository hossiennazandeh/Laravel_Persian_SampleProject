<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS File -->
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/common.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{asset('dist/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{ asset('css/user/animate.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('css/user/customs.css') }}" rel="stylesheet">
    <title>نظرات</title>
</head>
<body style="direction: rtl">
<header id="header">
    <div class="container">

        <div id="logo">
            <a href="#hero"><img src="{{ asset('img/user/logo.png') }}" alt="" title=""/></a>
            <!-- Uncomment below if you prefer to use a text image -->
            <!--<h1><a href="#hero">Header 1</a></h1>-->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li ><a href="/">خانه</a></li>
                <li class="menu-active" ><a href="{{route('comment')}}">نظرات</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->
<div class="container">


<div class="col-md-8 col-lg-offset-2 margin-top-25 margin-bottom-25">
    <div class="app-title">
        <h2>فرم نظرات</h2>
    </div>
    <form class="form-horizontal" method="POST" action="{{url('/home/post')}}">
        {{ csrf_field() }}
        <div class="form">
            <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="نام شما"
                       data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                <div class="validation"></div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="ایمیل شما"
                       data-rule="email" data-msg="Please enter a valid email" required/>
                <div class="validation"></div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="موضوع"
                       data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required />
                <div class="validation"></div>
            </div>
            <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required"
                                      data-msg="Please write something for us" placeholder="پیام" required></textarea>
                <div class="validation"></div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" data-title="send_message_us" type="submit" >ارسال نظر</button>
            </div>
        </div>
    </form>
</div>
</div>
<footer id="footer" class="margin-top-25">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    تمام حقوق برای<strong> مرکز تربیت مدرس قرآن قائن </strong>محفوظ است.
                </div>
                <div class="credits">
                    امروز گرسنگي فكر از گرسنگي نان فاجعه آميز تر است
                </div>
            </div>
        </div>
    </div>
</footer><!-- #footer -->
</body>
</html>