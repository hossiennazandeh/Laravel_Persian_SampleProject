@extends("admin.base.base")
@section('title')
    ویرایش مشخصات استاد
@endsection
@section('css')
    <link href="{{asset('dist/css/kamadatepicker.min.css')}}" rel="stylesheet">
@endsection
@section('header')
    ویرایش مشخصات استاد
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{\Illuminate\Support\Facades\URL::to("/admin/professor/list/1")}}">
                        <input type="button" class="btn btn-primary pull-right" value="بازگشت">
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">ویرایش مشخصات استاد</h4>
                    <p class="category">برای ویرایش مشخصات استاد، فرم زیر را پر نمایید.</p>
                </div>
                <div class="card-content">
                    <form name="news" class="" enctype='#'>
                        <div class="col-md-10 col-md-offset-1 col-xs-12">
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>نام :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="first_name" class="form-control" value="{{$professor->firstname}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>نام خانوادگی :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="last_name" class="form-control" value="{{$professor->lastname}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>نام پدر :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="father_name" class="form-control" value="{{$professor->father}}">
                                </div>
                            </div>
                            <div class="row margin-bottom-15">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>جنسیت :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    @if($professor->sex == 'male')
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" value="female"> زن
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" checked value="male"> مرد
                                            </label>
                                        </div>

                                    @else
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" value="female" checked> زن
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" value="male"> مرد
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>تاریخ تولد :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input id="birth_day" name="birth_day" class="form-control" value="{{$professor->birthday}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>محل تولد :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="birth_place" class="form-control"
                                           value="{{$professor->location_brith}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>کد ملی :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="national_code" class="form-control"
                                           value="{{$professor->national_code}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>تلفن :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="phone" class="form-control" value="{{$professor->phone}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>موبایل :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="mobile" class="form-control" value="{{$professor->mobile}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>آدرس :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <textarea maxlength="255" name="address"
                                              class="form-control">{{$professor->address}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>تصویر استاد :</label>
                                </div>
                                <div class="col-xs-12 col-md-5 pull-right">
                                    <input name="image_input" class="form-control display-none" type="file"
                                           accept="image/x-png, image/jpg, image/jpeg">
                                    <div id="photo" class="portfolio-item"
                                         style='background-image: url("@if($professor->img == null){{asset('img/admin/smsts-refresher-big.png')}}@else{{asset($professor->img)}}@endif");'>
                                        <div class="details">
                                            <h4>تعویض تصویر</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>کلمه عبور :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="password" type="password" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <input name="save_professor" type="button" class="btn btn-primary pull-left submit_button"
                                       value="ثبت">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{asset('dist/js/kamadatepicker.min.js')}}"></script>
    <script type="text/javascript">
        kamaDatepicker('birth_day', {
            nextButtonIcon: "fa fa-angle-right"
            , previousButtonIcon: "fa fa-angle-left"
            , forceFarsiDigits: true
            , markToday: true
            , markHolidays: true
            , highlightSelectedDay: true
            , sync: true
            , gotoToday: true
        });
        $(document).ready(function () {
            $('#photo').click(function () {
                $("input[name='image_input']").click()
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#photo').css("background-image", "url(' " + e.target.result + " ')");
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("input[name='image_input']").change(function () {
                var size = this.files[0].size;
                if (size <= 2000000) {
                    readURL(this);
                } else {
                    swal("خطا", "حجم تصویر بیشتر از حجم مجاز است." + "حد اکثر حجم مجاز : 2 مگابایت", "error");
                }
            });
            $("input[name='save_professor']").click(function (e) {
                e.preventDefault();
                var gender = $("input[name='optionsRadios']:checked").val();
                var file = $("input[name='image_input']")[0].files[0];
                var frm = new FormData();
                frm.append("file", file);
                frm.append("first_name", $("input[name='first_name']").val());
                frm.append("last_name", $("input[name='last_name']").val());
                frm.append("father_name", $("input[name='father_name']").val());
                frm.append("birth_day", $("input[name='birth_day']").val());
                frm.append("birth_place", $("input[name='birth_place']").val());
                frm.append("national_code", $("input[name='national_code']").val());
                frm.append("phone", $("input[name='phone']").val());
                frm.append("mobile", $("input[name='mobile']").val());
                frm.append("password", $("input[name='password']").val());
                frm.append("address", $("textarea[name='address']").val());
                frm.append("id", '{{$professor->id}}');
                frm.append("gender", gender);
                frm.append("_token", '{{csrf_token()}}');


                $.ajax({
                    url: "/admin/professor/edit/post",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: frm,
                    success: function (response) {
                        if (response['status']) {
                            swal("ثبت شد!", response['msg'], "success");
                        } else {
                            swal("خطا", response['msg'], "error");
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
@endsection