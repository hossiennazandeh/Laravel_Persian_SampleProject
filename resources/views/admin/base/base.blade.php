<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/admin/apple-icon.png') }}" />
	<link rel="icon" type="image/png" href="{{ asset('img/admin/favicon.png') }}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<!--  Social tags      -->
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	@yield('meta')
	<!-- Bootstrap core CSS     -->
	<link rel="stylesheet" href="/css/loader.css"/>
	<link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('dist/css/common.css') }}" rel="stylesheet" />
	<link href="{{asset('dist/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('dist/css/flaticon.css')}}" rel="stylesheet">
	<link href="{{ asset('dist/css/sweetalert.css') }}" rel="stylesheet" />

	<link href="{{ asset('css/admin/material-dashboard.css') }}" rel="stylesheet"/>
	<link href="{{ asset('css/admin/demo.css') }}" rel="stylesheet"/>
	<link href="{{ asset('css/admin/customs.css') }}" rel="stylesheet" />

	@yield('css')
</head>

<body>
<div class="loader">
	<div class="loader-spinner">Loading...</div>
</div>
<div class="wrapper">
	<div class="sidebar" data-active-color="red" data-background-color="black" data-image="{{asset('img/admin/sidebar-6.jpg')}}">
		<div class="logo">
			<a href="/admin/home" class="simple-text">
				پــنــل آمـــوزش
			</a>
		</div>
		<div class="logo logo-mini">
			<a href="/admin/home" class="simple-text">
				Ct
			</a>
		</div>
		<div class="sidebar-wrapper">
			<div class="user">
				<div class="photo">
					<img src="{{ asset('img/admin/defaulte_admin.jpg') }}" />
				</div>
				<div class="info">
					<a data-toggle="collapse" href="buttons.html#collapseExample" class="collapsed">
						آموزش
						<b class="caret"></b>
					</a>
					<div class="collapse" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="#">تغییر کلمه عبور</a>
							</li>
							<li>
								<a href="#" data-title="logout">خروج</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav">
				<li @if($active == 'home')class="active"@endif>
					<a href="/admin/home">
						<i class="flaticon-puzzle"></i>
						<p>خلاصه وضعیت</p>
					</a>
				</li>
				<li @if($active == 'management_semester')class="active"@endif>
					<a href="/admin/semester/list/1">
						<i class="flaticon-online-course"></i>
						<p>مدیریت ترم ها</p>
					</a>
				</li>
				<li @if($active == 'management_student')class="active"@endif>
					<a href="/admin/student/list/all/1">
						<i class="flaticon-female-graduate-student"></i>
						<p>مدیریت دانشجویان</p>
					</a>
				</li>
				<li @if($active == 'management_professor')class="active"@endif>
					<a href="/admin/professor/list/1">
						<i class="flaticon-teacher-showing-on-whiteboard"></i>
						<p>مدیریت اساتید</p>
					</a>
				</li>
				<li @if($active == 'management_course')class="active"@endif>
					<a href="/admin/course/list/1">
						<i class="flaticon-open-book"></i>
						<p>مدیریت دروس</p>
					</a>
				</li>
				<li @if($active == 'management_class')class="active"@endif>
					<a href="/admin/class/list/1">
						<i class="flaticon-classroom"></i>
						<p>مدیریت کلاس ها</p>
					</a>
				</li>
				<li @if($active == 'news')class="active"@endif>
					<a href="/admin/news/list/1">
						<i class="flaticon-time-1"></i>
						<p>مدیریت اخبار</p>
					</a>
				</li>
				<li @if($active == 'comment')class="active"@endif>
					<a href="/admin/comments">
						<i class="flaticon-like-1"></i>
						<p>مدیریت نظرات</p>
					</a>
				</li>
				<li @if($active == 'contact_us')class="active"@endif>
					<a href="/admin/contact_us">
						<i class="flaticon-opened-email-envelope"></i>
						<p>مدیریت تماس با ما</p>
					</a>
				</li>
				<li>
					<a data-title="logout" class="cursor-pointer">
						<i class="flaticon-exit"></i>
						<p >خروج</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="main-panel">
		<nav class="navbar navbar-transparent navbar-absolute">
			<div class="container-fluid">
				<div class="navbar-minimize">
					<button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
						<i class="flaticon-cube visible-on-sidebar-regular"></i>
						<i class="flaticon-windows-logo-silhouette visible-on-sidebar-mini"></i>
					</button>
				</div>
				<div class="navbar-header navbar-right">
					<button type="button" class="navbar-toggle" data-toggle="collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="">@yield('header')</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="/admin/home" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">خلاصه وضعیت</p>
							</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-envelope"></i>
								<span class="notification">5</span>
								<p class="hidden-lg hidden-md">
									پیام
									<b class="caret"></b>
								</p>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Mike John responded to your email</a>
								</li>
								<li>
									<a href="#">You have 5 new tasks</a>
								</li>
								<li>
									<a href="#">You're now friend with Andrew</a>
								</li>
								<li>
									<a href="#">Another Notification</a>
								</li>
								<li>
									<a href="#">Another One</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-user"></i>
								<p class="hidden-lg hidden-md">پروفایل</p>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">تغییر رمز</a>
								</li>
								<li>
									<a data-title="logout" href="#">خروج</a>
								</li>
							</ul>
						</li>
						{{--<li class="separator hidden-lg hidden-md"></li>--}}
					</ul>
				</div>
			</div>
		</nav>
		<div class="content">
			<div class="container-fluid">
				@yield('content')
			</div>
		</div>
		<footer class="footer">
			@yield('footer')
			<div class="container-fluid">
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
					<a href="#">شرکت رایان آیریک </a>,  ساخته شده با عشق برای یک وب سایت بهتر
				</p>
			</div>
		</footer>
	</div>
</div>
<div class="fixed-plugin">
	<div class="dropdown show-dropdown">
		<a href="buttons.html#" data-toggle="dropdown">
			<i class="fa fa-cog fa-2x"> </i>
		</a>
		<ul class="dropdown-menu">
			<li class="header-title">فیلترهای نوار کناری</li>
			<li class="adjustments-line">
				<a href="javascript:void(0)" class="switch-trigger active-color">
					<div class="badge-colors text-center">
						<span class="badge filter badge-purple" data-color="purple"></span>
						<span class="badge filter badge-blue" data-color="blue"></span>
						<span class="badge filter badge-green" data-color="green"></span>
						<span class="badge filter badge-orange" data-color="orange"></span>
						<span class="badge filter badge-red" data-color="red"></span>
						<span class="badge filter badge-rose " data-color="rose"></span>
					</div>
					<div class="clearfix"></div>
				</a>
			</li>
			<li class="header-title">پس زمینه نوار</li>
			<li class="adjustments-line">
				<a href="javascript:void(0)" class="switch-trigger background-color">
					<div class="text-center">
						<span class="badge filter badge-white" data-color="white"></span>
						<span class="badge filter badge-black " data-color="black"></span>
					</div>
					<div class="clearfix"></div>
				</a>
			</li>
			<li class="adjustments-line">
				<a href="javascript:void(0)" class="switch-trigger">
					<p>نوار کنار کوچک</p>
					<div class="togglebutton switch-sidebar-mini">
						<label>
							<input type="checkbox" unchecked="">
						</label>
					</div>
					<div class="clearfix"></div>
				</a>
			</li>
			<li class="adjustments-line">
				<a href="javascript:void(0)" class="switch-trigger">
					<p>تصویر نوار کنار</p>
					<div class="togglebutton switch-sidebar-image">
						<label>
							<input type="checkbox" checked="">
						</label>
					</div>
					<div class="clearfix"></div>
				</a>
			</li>
			<li class="header-title">تصاویر</li>
			<li class="">
				<a class="img-holder switch-trigger" href="javascript:void(0)">
					<img src="{{asset('img/admin/sidebar-6.jpg')}}" alt="" />
				</a>
			</li>
			<li>
				<a class="img-holder switch-trigger" href="javascript:void(0)">
					<img src="{{asset('img/admin/sidebar-5.jpg')}}" alt="" />
				</a>
			</li>
			<li>
				<a class="img-holder switch-trigger" href="javascript:void(0)">
					<img src="{{asset('img/admin/sidebar-3.jpeg')}}" alt="" />
				</a>
			</li>
			<li>
				<a class="img-holder switch-trigger" href="javascript:void(0)">
					<img src="{{asset('img/admin/sidebar-4.jpg')}}" alt="" />
				</a>
			</li>
			<li class="button-container">
				<div class="">
					<button name="change_design" class="btn btn-info btn-block">اعمال تغییرات</button>
				</div>
			</li>
		</ul>
	</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="{{asset('dist/js/jquery-3.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dist/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('dist/js/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dist/js/js-cookie.js')}}"></script>

<script src="{{asset('js/admin/material.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/admin/material-dashboard.js')}}"></script>
<script src="{{asset('js/admin/demo.js')}}"></script>

@yield('javascript')
<script type="text/javascript">
    $(document).ready(function () {
        $('a[data-title="logout"]').click(function (e) {
            e.preventDefault();
            swal({
                    title: "آیا شما مطمئن هستید؟",
                    text: "در صورت خروج ، باید دوباره عملیات ورود را انجام دهید!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "خروج",
                    closeOnConfirm: false
                },
                function () {
                    var data = {};
                    data.status = 'logout';
                    data._token = "{{csrf_token()}}";
                    $.ajax({
                        url: "/admin/logout",
                        type: "POST",
                        data: data,
                        success: function (response) {
                            if (response['status']) {
                                window.location.href ='/admin/login'
                            } else {
                                swal("خطا", "error");
                            }
                        },
                        error: function () {
                            alert("Error.........")
                        },
                        complete: function () {
                        }
                    });
                });
        })
    })
</script>
</html>