<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')

    <link rel="stylesheet" type="text/css" href="{{asset('css/student/vendor.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/student/flat-admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/student/customs.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/flaticon.css')}}">
    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/student/theme/blue-sky.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/student/theme/blue.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/student/theme/red.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/student/theme/yellow.css')}}">
    @yield('css')
</head>
<body>
<div class="app app-default">

    <aside class="app-sidebar" id="sidebar">
        <div class="sidebar-header">
            {{--<a class="sidebar-brand" href="#"><span class="highlight">دانشجو</span> پورتال</a>--}}
            <a class="sidebar-brand" href="#"><img class="img-responsive" src="{{asset('img/main-logo-2.png')}}"/></a>
            <button type="button" class="sidebar-toggle">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="sidebar-menu">
            <ul class="sidebar-nav">
                <li @if($active == 'home')class="active"@endif>
                    <a href="/student/home">
                        <div class="icon">
                            <i class="flaticon-cube" aria-hidden="true"></i>
                        </div>
                        <div class="title">خلاصه وضعیت</div>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="flaticon-settings-1" aria-hidden="true"></i>
                        </div>
                        <div class="title">خدمات</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            {{--<li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> UI Kits</li>--}}
                            <li><i class="flaticon-settings"></i><a href="/student/setting">تنظیمات</a></li>
                            <li><i class="flaticon-password"></i><a href="/student/password">تغییر کلمه عبور</a></li>
                            <li><i class="flaticon-doubts-in-human-mind"></i><a href="#">ارسال پیشنهادات و سوالات</a></li>
                            {{--<li class="line"></li>--}}
                            {{--<li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Advanced Components</li>--}}
                        </ul>
                    </div>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="flaticon-user" aria-hidden="true"></i>
                        </div>
                        <div class="title">شخصی</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><i class="flaticon-people"></i><a href="#">مشخصات دانشجو</a></li>
                            <li><i class="flaticon-management"></i><a href="#">ویرایش مشخصات دانشجو</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="icon">
                            <i class="flaticon-teacher-teaching-grammar-class-on-a-whiteboard" aria-hidden="true"></i>
                        </div>
                        <div class="title">آموزشی</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li>
                                <a href="/student/course/available">دروس ارائه شده ترم</a>
                                <i class="flaticon-books-stack-of-three"></i>
                            </li>
                            <li><i class="flaticon-radio-button-group"></i><a href="/student/select_unit">انتخاب واحد</a></li>
                            <li><i class="flaticon-photo-contrast-symbol"></i><a href="/student/remove_add_unit">حذف و اضافه</a></li>
                            <li><i class="flaticon-table-selection-cell"></i><a href="#">برنامه کلاسی</a></li>
                            <li><i class="flaticon-time"></i><a href="#">برنامه امتحانی</a></li>
                            <li><i class="flaticon-a-best-test-result"></i><a href="#">اطلاعیه نمرات ترم</a></li>
                            <li><i class="flaticon-scoreboard"></i><a href="#">اطلاعیه نمرات</a></li>
                            <li><i class="flaticon-medical"></i><a href="#">چارت درسی</a></li>
                            <li><i class="flaticon-interface-2"></i><a href="#">کارت ورود به جلسه</a></li>
                            <li><i class="flaticon-student-making-a-question-in-class"></i><a href="#">ارتباط با استاد</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="sidebar-footer">
            <ul class="menu">
                <li>
                    <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                    </a>
                </li>
                <li><a href="#"><span class="flag-icon flag-icon-th flag-icon-squared"></span></a></li>
            </ul>
        </div>
    </aside>

    <div class="app-container">

        <nav class="navbar navbar-default" id="navbar">
            <div class="container-fluid">
                <div class="navbar-collapse collapse in">
                    <ul class="nav navbar-nav navbar-mobile">
                        <li>
                            <button type="button" class="sidebar-toggle">
                                <i class="fa fa-bars"></i>
                            </button>
                        </li>
                        <li class="logo">
                            <a class="navbar-brand" href="#"><span class="highlight">Flat v3</span> Admin</a>
                        </li>
                        <li>
                            <button type="button" class="navbar-toggle">
                                <img class="profile-img" src="{{asset('img/default-student.png')}}">
                            </button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="navbar-title">@yield('navbar-title')</li>
                        <li class="navbar-search hidden-sm">
                            <input id="search" type="text" placeholder="جستجو...">
                            <button class="btn-search"><i class="flaticon-search"></i></button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown notification">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
                                <div class="title">New Orders</div>
                                <div class="count">0</div>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li class="dropdown-header">Ordering</li>
                                    <li class="dropdown-empty">No New Ordered</li>
                                    <li class="dropdown-footer">
                                        <a href="#">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown notification warning">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="icon"><i class="fa fa-comments" aria-hidden="true"></i></div>
                                <div class="title">Unread Messages</div>
                                <div class="count">99</div>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li class="dropdown-header">Message</li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-warning pull-right">10</span>
                                            <div class="message">
                                                <img class="profile" src="https://placehold.it/100x100">
                                                <div class="content">
                                                    <div class="title">"Payment Confirmation.."</div>
                                                    <div class="description">Alan Anderson</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-warning pull-right">5</span>
                                            <div class="message">
                                                <img class="profile" src="https://placehold.it/100x100">
                                                <div class="content">
                                                    <div class="title">"Hello World"</div>
                                                    <div class="description">Marco Harmon</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-warning pull-right">2</span>
                                            <div class="message">
                                                <img class="profile" src="https://placehold.it/100x100">
                                                <div class="content">
                                                    <div class="title">"Order Confirmation.."</div>
                                                    <div class="description">Brenda Lawson</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a href="#">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown notification danger">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="icon"><i class="fa fa-bell" aria-hidden="true"></i></div>
                                <div class="title">System Notifications</div>
                                <div class="count">10</div>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li class="dropdown-header">Notification</li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-danger pull-right">8</span>
                                            <div class="message">
                                                <div class="content">
                                                    <div class="title">New Order</div>
                                                    <div class="description">$400 total</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-danger pull-right">14</span>
                                            Inbox
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-danger pull-right">5</span>
                                            Issues Report
                                        </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a href="#">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown profile">
                            <a href="/html/pages/profile.html" class="dropdown-toggle" data-toggle="dropdown">
                                <img class="profile-img" src="{{asset('img/default-student.png')}}">
                                <div class="title">Profile</div>
                            </a>
                            <div class="dropdown-menu">
                                <div class="profile-info">
                                    <h4 class="username">مهدی علی زاده</h4>
                                </div>
                                <ul class="action">
                                    <li>
                                        <a href="#">پروفایل</a>
                                    </li>
                                    {{--<li>--}}
                                        {{--<a href="#">--}}
                                            {{--<span class="badge badge-danger pull-right">5</span>--}}
                                            {{--My Inbox--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    <li>
                                        <a href="#">
                                            تنظیمات
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">خروج</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="btn-floating" id="help-actions">
            <div class="btn-bg"></div>
            <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
                <i class="icon fa fa-plus"></i>
                <span class="help-text">Shortcut</span>
            </button>
            <div class="toggle-content">
                <ul class="actions">
                    <li><a href="#">Website</a></li>
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">Issues</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
        </div>

        @yield('content')

        <footer class="app-footer">
            @yield('footer')
            <div class="row">
                <div class="col-xs-12">
                    <div class="footer-copyright">
                        Copyright © 2016 Company Co,Ltd.
                    </div>
                </div>
            </div>
        </footer>
    </div>

</div>
<script type="text/javascript" src="{{asset('dist/js/jquery-3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/student/vendor.js')}}"></script>
<script type="text/javascript" src="{{asset('js/student/app.js')}}"></script>
@yield('javascript')
</body>
</html>