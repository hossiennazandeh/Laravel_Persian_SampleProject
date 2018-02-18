<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>مرکز عالی تربیت مدرس قرآن کریم شهرستان قائن</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
    <meta property="og:title" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">

    <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

    <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
    <link href="favicon.ico" rel="shortcut icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
          rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/common.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{asset('dist/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{ asset('css/user/animate.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('css/user/customs.css') }}" rel="stylesheet">

    <!-- =======================================================
      Theme Name: Imperial
      Theme URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
      Author: BootstrapMade.com
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
<div id="preloader"></div>

<!--==========================
  Hero Section
============================-->
<section id="hero">
    <div class="hero-container">
        <div class="wow fadeIn">
            <div class="hero-logo">
                <img class="" src="{{ asset('img/user/logo.png') }}" alt="Imperial">
            </div>

            <h1>به مرکز آموزش قرآن خوش آمدید</h1>
            <h2>ارائه خدمات <span class="rotating"> آموزشی , فعالیت های قرآنی , پژوهشی </span></h2>
            <div class="actions">
                <a href="#about" class="btn-get-started">شروع به کار</a>
                <a href="#services" class="btn-services">خدمات مرکز</a>
            </div>
        </div>
    </div>
</section>

<!--==========================
  Header Section
============================-->
<header id="header">
    <div class="container">

        <div id="logo">
            <a href="#hero"><img src="{{ asset('img/user/logo.png') }}" alt="" title=""/></a>
            <!-- Uncomment below if you prefer to use a text image -->
            <!--<h1><a href="#hero">Header 1</a></h1>-->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="#hero">خانه</a></li>
                <li><a href="#about">درباره ما</a></li>
                <li><a href="#services">خدمات</a></li>
                {{--<li><a href="#portfolio">اخبار</a></li>--}}
                <li><a href="#testimonials">اخبار</a></li>
                <li><a href="#team">اساتید</a></li>
                {{--<li class="menu-has-children"><a href="">Drop Down</a>--}}
                    {{--<ul>--}}
                        {{--<li><a href="#">Drop Down 1</a></li>--}}
                        {{--<li class="menu-has-children"><a href="#">Drop Down 2</a>--}}
                            {{--<ul>--}}
                                {{--<li><a href="#">Deep Drop Down 1</a></li>--}}
                                {{--<li><a href="#">Deep Drop Down 2</a></li>--}}
                                {{--<li><a href="#">Deep Drop Down 3</a></li>--}}
                                {{--<li><a href="#">Deep Drop Down 4</a></li>--}}
                                {{--<li><a href="#">Deep Drop Down 5</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="#">Drop Down 3</a></li>--}}
                        {{--<li><a href="#">Drop Down 4</a></li>--}}
                        {{--<li><a href="#">Drop Down 5</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li><a href="#contact">تماس با ما</a></li>
                <li><a href="{{route('comment')}}">نظرات</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

<!--==========================
  About Section
============================-->
<section id="about">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">درباره ما</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">مركز عالي تربيت مدرس و استاد قران كريم با همكاري اداره فرهنگ و ارشاد
                    اسلامي خراسان رضوي و جامعه قاريان قرآن مشهد در اسفند ماه 1373 تأسيس گرديد</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <p class="about-text">
                    هدف از تأسيس اين مركز پرورش و تربيت نيروي متخصص و متعهد جهت آموزش تعليم و برنامه هاي قرآني و ديني در
                    سطوح مختلف آموزشي و تربيتي و نيز تعميم و فراگير نمودن تعاليم ديني و قرآني در سطح مسيع جامعه و همچنين
                    فراهم نمودن بستر مناسب جهت ايجاد انس با قرآن . فهم آن و نهادينه نمودن تعاليم ديني و قرآني در اذهان
                    علاقه مندان به فعاليتهاي مذهبي و ديني مي باشد.
                    فعاليت عمده مركز عالي تربيت مدرس و استاد قرآن كريم آن است كه همزمان با آموزش و آشنا نمودن فراگيران
                    با علوم و فنون قرائت قرآن ، زمينه هاي مأنوس شدن با اين كلام وحداني « قرآن كريم » را فراهم نمايد و در
                    اين رابطه نيز افراد علاقمند ره هر چه بيشتر با تعاليم ديني آشنا نموده تا آنان خود نيز بتوانند در مسير
                    كلام حق قدم نهند.و به عنوان مدرس و استاد قرآن كريم ، مشتاقان و علاقمندان به فراگيري تعاليم ديني ره
                    با بهر گيري از دانش و اطلاعات كسب شده در اين مركز با قرآن به طور كامل و جامع آشنا نمايند.
                </p>
            </div>
        </div>
    </div>
    <div class="container about-container wow fadeInUp">
        <div class="row">
            <div class="col-md-6 col-md-push-6 about-content">
                <h3 class="about-title">مرکز تربیت مدرس قرآن کریم قاین در یک نگاه</h3>
                <ul class="about-ul">
                    <li>این مرکز در شهریور ماه 1386 شروع به ثبت نام کردو با 470 نفر متقاضی ،در مهر ماه آزمون ورودی
                        برگزار شد
                    </li>
                    <li>264 نفر در 25 کلاس درس باحضور 13 نفر از اساتید برجسته عملا کار تربیت مربی قرآن کریم آغاز شد</li>
                    <li>در همان ترم اول شورای دانشجویی و بسیج دانشجویی مرکز فعالیت خود را آغاز کرد</li>
                    <li>در 18 بهمن 86 کتابخانه مرکز افتتاح شد</li>
                    <li>در تاریخ 86/11/3 آزمون ورودی ترم دوم با 180 نفر متقاضی برگزار شد</li>
                    <li>از 86/11/10 ترم دوم با 358 نفر دانشجودر 27 کلاس درس با حضور 10 نفر از اساتید آغاز شد</li>
                    <li>در خردادماه 1387 چهار کلاس روش تدریس با حضور 4 نفر از اساتید کشوری به شرح ذیل برگزار شد</li>
                    <li>1- روش تدریس روخوانی (استاد محمد صادق جعفری )</li>
                    <li>2- روش تدریس حفظ (استاد حسنی –قاری وحافظ بین الملل)</li>
                    <li>3- روش تدریس روخوانی پیش دبستانی (استاد محسنی)</li>
                    <li>4- روش تدریس حفظ پیش دبستانی (استاد حمیدیان )</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==========================
  Services Section
============================-->
<section id="services">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">خدمات مرکز</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">« خداوندا،تو میدانی ، که انسان بودن و ماندن در این دنیا چه دشوار است.چه
                    رنجی می کشد آن کس که انسان است و از احساس سرشار »</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 service-item pull-right">
                <div class="service-icon"><i class="flaticon-teacher-showing-on-whiteboard"></i></div>
                <a href="http://www.mt-qaen.ir/student/login">
                    <h4 class="service-title">پرتال اساتید</h4>
                </a>
                <p class="service-description">استادان گرامی برای ورود به پنل خود از این قسمت استفاده کنید.</p>
            </div>
            <div class="col-md-4 service-item pull-right">
                <div class="service-icon"><i class="flaticon-female-graduate-student"></i></div>
                <a href="http://www.mt-qaen.ir/student/login">
                    <h4 class="service-title">پرتال دانشجویان</h4>
                </a>
                <p class="service-description">دانشجویان عزیز برای ورود به پنل خود از این قسمت استفاده کنید.</p>
            </div>
            <div class="col-md-4 service-item pull-right">
                <div class="service-icon"><i class="flaticon-telegram-1"></i></div>
                <a href="https://telegram.me/qaen_qoran_news">
                    <h4 class="service-title">کانال تلگرام مرکز</h4>
                </a>
                <p class="service-description">برای اطلاع از اخبار و اطلاعیه های مرکز آموزش قرآن در کانال تلگرام مرکز
                    عضو شوید.</p>
            </div>
        </div>
    </div>
</section>

<!--==========================
  Subscrbe Section
============================-->
<section id="subscribe">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-9">
                <h3 class="subscribe-title">حدیث روز</h3>
                <p class="subscribe-text">
                    <script id="daily-hadith"
                            src="http://daily.hadith.net/dailyscript/v1/20170530042632553-panel-155.js"
                            type="text/javascript"></script>
                </p>
            </div>
            <div class="col-md-3 subscribe-btn-container">
                <i class="flaticon-quill-drawing-a-line"></i>
            </div>
        </div>
    </div>
</section>

<!--==========================
  Porfolio Section
============================-->
{{--<section id="portfolio">--}}
    {{--<div class="container wow fadeInUp">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<h3 class="section-title">اخبار</h3>--}}
                {{--<div class="section-title-divider"></div>--}}
                {{--<p class="section-description">به روز ترین اخبار مربوط به مرکز عالی تربیت مدرس قرآن کریم شهرستان قائن را--}}
                    {{--میتوانید در ذیل مشاهده نمایید. </p>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="row">--}}
            {{--<div class="col-md-3 pull-right">--}}
                {{--<a class="portfolio-item" style='background-image: url("{{asset('img/default-news.jpg')}}");' href="">--}}
                    {{--<div class="details">--}}
                        {{--<h4>عنوان خبر</h4>--}}
                        {{--<span>چکیده ای از خبر</span>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 pull-right">--}}
                {{--<a class="portfolio-item" style='background-image: url("{{asset('img/default-news.jpg')}}");' href="">--}}
                    {{--<div class="details">--}}
                        {{--<h4>عنوان خبر</h4>--}}
                        {{--<span>چکیده ای از خبر</span>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 pull-right">--}}
                {{--<a class="portfolio-item" style='background-image: url("{{asset('img/default-news.jpg')}}");' href="">--}}
                    {{--<div class="details">--}}
                        {{--<h4>عنوان خبر</h4>--}}
                        {{--<span>چکیده ای از خبر</span>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 pull-right">--}}
                {{--<a class="portfolio-item" style='background-image: url("{{asset('img/default-news.jpg')}}");' href="">--}}
                    {{--<div class="details">--}}
                        {{--<h4>عنوان خبر</h4>--}}
                        {{--<span>چکیده ای از خبر</span>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</div>--}}


        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

<!--==========================
  Testimonials Section
============================-->
<section id="testimonials">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">اخبار</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">به روز ترین اخبار مربوط به مرکز عالی تربیت مدرس قرآن کریم شهرستان قائن را
                    میتوانید در ذیل مشاهده نمایید.</p>
            </div>
        </div>
        <div class="scrollbars">

            @foreach($news as $item)
                <div class="parent-news">
                    <div class="row">
                        <div class="col-md-3 pull-right profile">
                            <img class="pic" src="@if($item->img == null){{asset('img/default-news.jpg')}}@else{{asset($item->img)}}@endif" alt="">
                        </div>
                        <div class="col-md-9 pull-right">
                            <div class="quote">
                                <p class="quote-date"><i class="glyphicon glyphicon-calendar padding-left-5 "></i>{{$item->publish_date}}</p>
                                <p>
                                    <a class="green-color" href="#">{{$item->title}}</a>
                                </p>
                                <p>{{$item->abstract}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!--==========================
  Team Section
============================-->
<section id="team">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">اساتید</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">اساتیدی که در مرکز تربیت مدرس و استاد قرآن کریم در حال فعالیت هستند.</p>
            </div>
        </div>

        <div class="row">
            @foreach($list_professor as $one_professor)
            <div class="col-md-3 pull-right">
                <div class="member">
                    <div class="pic"><img @if($one_professor['img'] == null)src={{asset('img/admin/smsts-refresher-big.png')}}@else src={{asset($one_professor['img'])}}@endif alt=""></div>
                    <h4 data-content="{{$one_professor['id']}}">{{$one_professor['all_name']}}</h4>
                    {{--<span>Chief Executive Officer</span>--}}
                    {{--<div class="social">--}}
                        {{--<a href=""><i class="fa fa-twitter"></i></a>--}}
                        {{--<a href=""><i class="fa fa-facebook"></i></a>--}}
                        {{--<a href=""><i class="fa fa-google-plus"></i></a>--}}
                        {{--<a href=""><i class="fa fa-linkedin"></i></a>--}}
                    {{--</div>--}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!--==========================
  Contact Section
============================-->
<section id="contact">
    <div class="container wow fadeInUp">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">تماس با ما</h3>
                <div class="section-title-divider"></div>
                <p class="section-description">پذیرای نظرات و پیشنهادات شما برای بهبود راهمان هستیم . کارشناسان ما نظرات
                    شما را بررسی کرده و در اولین فرصت پاسخ را ارسال خواهند کرد.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-md-pull-2 pull-right">
                <div class="info">
                    <div>
                        <i class="flaticon-road"></i>
                        <p>خیابان شهید نامجو<br>رو به روی رستوران سنتی</p>
                    </div>

                    <div>
                        <i class="flaticon-symbol"></i>
                        <p>info@example.com</p>
                    </div>

                    <div>
                        <i class="flaticon-office-telephone"></i>
                        <p>056-32529249<br/>056-32529250</p>
                    </div>

                </div>
            </div>

            <div class="col-md-5 col-md-pull-2 pull-right">
                <form class="form-horizontal" method="POST" action="{{url('/home/post')}}">
                    {{ csrf_field() }}
                <div class="form">
                    <div id="sendmessage">پیام شماارسال شد. با تشکر!</div>
                    <div id="errormessage"></div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="نام شما"
                                   data-rule="minlen:4" data-msg="Please enter at least 4 chars"/>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="ایمیل شما"
                                   data-rule="email" data-msg="Please enter a valid email" required/>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="موضوع"
                                   data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required"
                                      data-msg="Please write something for us" placeholder="پیام" required></textarea>
                            <div class="validation"></div>
                        </div>
                        <div class="text-center">
                            <button data-title="send_message_us" type="submit" >ارسال نظر</button>
                        </div>
                </div>
                </form>
            </div>

        </div>
    </div>
</section>

<!--==========================
  Footer
============================-->
<footer id="footer">
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

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Required JavaScript Libraries -->

<script src="{{asset('dist/js/jquery-3.min.js')}}"></script>
<script src="{{asset('js/user/jquery-migrate.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap.js')}}"></script>
<script src="{{asset('js/user/hoverIntent.js')}}"></script>
<script src="{{asset('js/user/superfish.min.js')}}"></script>
<script src="{{asset('js/user/morphext.min.js')}}"></script>
<script src="{{asset('js/user/wow.min.js')}}"></script>
<script src="{{asset('js/user/sticky.js')}}"></script>
<script src="{{asset('js/user/easing.min.js')}}"></script>
<script src="{{asset('dis‍‍t/js/jquery.nicescroll.min.js')}}"></script>

<!-- Template Specisifc Custom Javascript File -->
<script src="{{asset('js/user/custom.js')}}"></script>

</body>
</html>