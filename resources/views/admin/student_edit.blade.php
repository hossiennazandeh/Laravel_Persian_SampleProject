@extends("admin.base.base")
@section('title')
    ویرایش مشخصات دانشجو
@endsection
@section('css')
    <link href="{{asset('dist/css/kamadatepicker.min.css')}}" rel="stylesheet">
@endsection
@section('header')
    ویرایش مشخصات دانشجو
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{\Illuminate\Support\Facades\URL::to("/admin/student/list/all/1")}}">
                        <input type="button" class="btn btn-primary pull-right" value="بازگشت">
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">ویرایش مشخصات دانشجو</h4>
                    <p class="category">برای ویرایش مشخصات دانشجو، فرم زیر را پر نمایید.</p>
                </div>
                <div class="card-content">
                    <form name="news" class="" enctype='#'>
                        <div class="col-md-10 col-md-offset-1 col-xs-12">
                            <div class="row margin-bottom-5">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>نام :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="first_name" class="form-control" value="{{$student->firstname}}">
                                </div>
                            </div>
                            <div class="row margin-bottom-5">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>نام خانوادگی :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="last_name" class="form-control" value="{{$student->lastname}}">
                                </div>
                            </div>
                            <div class="row margin-bottom-5">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>نام پدر :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="father_name" class="form-control" value="{{$student->father}}">
                                </div>
                            </div>
                            <div class="row margin-bottom-5">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>تاریخ تولد :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input id="birth_day" name="birth_day" class="form-control" value="{{$student->brithday}}" placeholder="روز/ماه/سال">
                                </div>
                            </div>
                            <div class="row margin-bottom-5">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>محل تولد :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="birth_place" class="form-control" value="{{$student->location_brith}}">
                                </div>
                            </div>
                            <div class="row margin-bottom-5">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>کد ملی :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="national_code" class="form-control"
                                           value="{{$student->national_code}}">
                                </div>
                            </div>
                            <div class="row margin-bottom-5">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>شماره شناسنامه :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="id" class="form-control" value="{{$student->id}}">
                                </div>
                            </div>
                            <div class="row margin-bottom-5">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>ترم ورود :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    @if($list_term == false)
                                        <p class="colorRed">هیچ ترمی وجود ندارد</p>
                                    @else
                                        <select name="entry_semester" class="selectpicker" data-style="select-with-transition" title="انتخاب ترم" required="required">
                                            @foreach($list_term['list_term'] as $one_term)
                                                <option @if($one_term->term == $student->entry_semester) selected @endif value="{{$one_term->term}}">{{$one_term->term}}@if($one_term->status == 'now')(ترم جاری)@endif</option>
                                            @endforeach
                                        </select>
                                    @endif
                                    {{--<input name="entry_semester" class="form-control" placeholder="برای نمونه : 1395-مهر" value="{{$student->entry_semester}}">--}}
                                </div>
                            </div>
                            <div class="row margin-bottom-5">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>تلفن :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="phone" class="form-control" placeholder="برای نمونه : 9249-3252-056" value="{{$student->phone}}">
                                </div>
                            </div>
                            <div class="row margin-bottom-5">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>موبایل :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="mobile" class="form-control" value="{{$student->mobile}}">
                                </div>
                            </div>
                            <div class="row margin-bottom-5">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>آدرس :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <textarea maxlength="255" name="address" class="form-control" title="آدرس">{{$student->address}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>تصویر دانشجو :</label>
                                </div>
                                <div class="col-xs-12 col-md-5 pull-right">
                                    <input name="image_input" class="form-control display-none" type="file"
                                           accept="image/x-png, image/jpg, image/jpeg">
                                    <div id="photo" class="portfolio-item"
                                         style='background-image: url("@if($student->img == null){{asset('img/default-student.png')}}@else{{asset($student->img)}}@endif");'>
                                        <div class="details">
                                            <h4>تعویض تصویر</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row margin-bottom-5">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>کلمه عبور :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="password" class="form-control">
                                </div>
                            </div>
                            <div class="row margin-bottom-5">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>وضعیت دانشجو :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <select id="commodity_situation" class="selectpicker" data-style="select-with-transition" title="انتخاب وضعیت" required="required">
                                        @if($student->status == 'active')
                                            <option value="" selected="selected">در حال تحصیل</option>
                                            <option value="">معلق</option>
                                            <option value="">اخراج شده</option>
                                            <option value="">فارغ التحصیل</option>
                                        @elseif($student->status == 'non_active')
                                            <option value="">در حال تحصیل</option>
                                            <option value="" selected="selected">معلق</option>
                                            <option value="">اخراج شده</option>
                                            <option value="">فارغ التحصیل</option>
                                        @elseif($student->status == '0923004407')
                                            <option value="">در حال تحصیل</option>
                                            <option value="">معلق</option>
                                            <option value="" selected="selected">اخراج شده</option>
                                            <option value="">فارغ التحصیل</option>
                                        @else
                                            <option value="">در حال تحصیل</option>
                                            <option value="">معلق</option>
                                            <option value="">اخراج شده</option>
                                            <option value="" selected="selected">فارغ التحصیل</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            {{--<div class="row margin-bottom-15">--}}
                                {{--<div class="colxs-12 col-md-2 pull-right">--}}
                                    {{--<label>شهریه ثابت :</label>--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-12 col-md-10 pull-right">--}}
                                    {{--<div class="radio">--}}
                                        {{--<label>--}}
                                            {{--<input type="radio" name="optionsRadios" value="paid"> پرداخت شده--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="radio">--}}
                                        {{--<label>--}}
                                            {{--<input type="radio" name="optionsRadios" value="unpaid" checked> پرداخت نشده--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="row margin-top-15">
                                <input name="save_student" type="button" class="btn btn-primary pull-left submit_button"
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
    <script src="{{asset('js/admin/jquery.select-bootstrap.js')}}"></script>
    <script src="{{asset('dist/js/kamadatepicker.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
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
            $("input[name='save_student']").click(function (e) {
                e.preventDefault();
                var status = $("select[id='commodity_situation'] :selected").text();
                if (status == 'در حال تحصیل') {
                    status = 'active'
                } else if (status == 'معلق') {
                    status = 'non_active'
                } else if (status == 'اخراج شده') {
                    status = 'expulsion';
                }else if(status == 'فارغ التحصیل'){
                    status = 'alumnus';
                }
                var file = $("input[name='image_input']")[0].files[0];
                var frm = new FormData();
                frm.append("file", file);
                frm.append("first_name", $("input[name='first_name']").val());
                frm.append("last_name", $("input[name='last_name']").val());
                frm.append("father_name", $("input[name='father_name']").val());
                frm.append("birth_day", $("input[name='birth_day']").val());
                frm.append("birth_place", $("input[name='birth_place']").val());
                frm.append("national_code", $("input[name='national_code']").val());
                frm.append("id", $("input[name='id']").val());
                frm.append("phone", $("input[name='phone']").val());
                frm.append("mobile", $("input[name='mobile']").val());
                frm.append("password", $("input[name='password']").val());
                frm.append("address", $("textarea[name='address']").val());
                frm.append("entry_semester", $("select[name='entry_semester'] :selected").val());
                frm.append("student_number", '{{$student_number}}');
                frm.append("commodity_situation", status);
                frm.append("_token", '{{csrf_token()}}');


                $.ajax({
                    url: "/admin/student/edit/post",
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