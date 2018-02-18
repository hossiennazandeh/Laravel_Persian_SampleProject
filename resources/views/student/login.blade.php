<!DOCTYPE html>
<html>
<head>
    <title>پرتال جامع اعضا</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/student/vendor.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/student/flat-admin.css')}}">
    <link href="{{ asset('dist/css/sweetalert.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/student/customs.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/flaticon.css')}}">
    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/student/theme/blue-sky.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/student/theme/blue.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/student/theme/red.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/student/theme/yellow.css')}}">

</head>
<body>
<div class="app app-default">

    <div class="app-container app-login">
        <div class="flex-center">
            <div class="app-header"></div>
            <div class="app-body">
                <div class="loader-container text-center">
                    <div class="icon">
                        <div class="sk-folding-cube">
                            <div class="sk-cube1 sk-cube"></div>
                            <div class="sk-cube2 sk-cube"></div>
                            <div class="sk-cube4 sk-cube"></div>
                            <div class="sk-cube3 sk-cube"></div>
                        </div>
                    </div>
                    <div class="title">Logging in...</div>
                </div>
                <div class="app-block">
                    <div class="app-form">
                        <div class="form-header">
                            <div class="app-brand">ورود به <span class="highlight">سیستم</span></div>
                        </div>
                        <form action="/" method="POST">
                            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" name="username" class="form-control" placeholder="نام کاربری"
                                       aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                <i class="fa fa-key" aria-hidden="true"></i></span>
                                <input type="text" name="password" class="form-control" placeholder="رمز عبور"
                                       aria-describedby="basic-addon2">
                            </div>
                            <div class="text-center">
                                <button  name="login" class="btn btn-success btn-submit" value="">ورود</button>
                            </div>
                        </form>
                        <div class="form-line">
                            <div class="title">* * *</div>
                        </div>
                        <div class="form-footer">
                            <button type="button" class="btn btn-danger">
                                <div class="info">
                                    <i class="icon fa fa-lock" aria-hidden="true"></i>
                                    &#160;&#160;
                                    <span class="title">بازنشانی رمز عبور</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-footer">
            </div>
        </div>
    </div>

</div>

<script type="text/javascript" src="{{asset('dist/js/jquery-3.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js/student/vendor.js')}}"></script>
<script type="text/javascript" src="{{asset('js/student/app.js')}}"></script>
<script src="{{asset('dist/js/sweetalert.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('button[name="login"]').click(function () {
            var data = {};
            data.username = $('input[name="username"]').val();
            data.password = $('input[name="password"]').val();
            data._token = "{{csrf_token()}}";
            $.ajax({
                url: "/student/login/post",
                type: "POST",
                data: data,
                success: function (response) {
                    if (response['status']) {
                        window.location.href = response['url'];
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
    })
</script>

</body>
</html>