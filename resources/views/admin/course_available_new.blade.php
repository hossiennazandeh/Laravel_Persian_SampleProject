@extends("admin.base.base")
@section('title')
    ارائه درس جدید
@endsection
@section('css')
    <link href="{{asset('dist/css/kamadatepicker.min.css')}}" rel="stylesheet">
@endsection
@section('header')
    ارائه درس جدید
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{\Illuminate\Support\Facades\URL::to("/admin/course/available/list/1")}}">
                        <input type="button" class="btn btn-primary pull-right" value="بازگشت">
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">ارائه درس جدید</h4>
                    <p class="category">برای ارائه درس جدید، فرم زیر را پر نمایید.</p>
                </div>
                <div class="card-content">
                    <form name="news" class="" enctype='#'>
                        <div class="col-md-10 col-md-offset-1 col-xs-12">
                            <div class="row">
                                <div class="colxs-12 col-sm-2 pull-right">
                                    <label>ترم جاری :</label>
                                </div>
                                @if($term_now == false)
                                    <div class="col-xs-12 col-sm-10 pull-right">
                                        <p class="colorRed">هیچ ترم جاری وجود ندارد</p>
                                    </div>
                                @else
                                    <div class="col-xs-12 col-sm-10 pull-right">
                                        <input name="term_now" class="form-control colorRed" value="{{$term_now}}" disabled>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-sm-2 pull-right">
                                    <label>برای ورودی :</label>
                                </div>
                                @if($list_semester['status'] == '350')
                                    <div class="col-xs-12 col-sm-10 pull-right">
                                        <select name="semester" class="SlectBox selectpicker" data-style="select-with-transition"
                                                title="انتخاب ورودی">
                                            @foreach($list_semester['list_semester'] as $one_semester)
                                                <option value="{{$one_semester}}">{{$one_semester}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <div class="col-xs-12 col-sm-10 pull-right">
                                        <p class="colorRed">هیچ دانشجوی ثبت نام شده ای وجود ندارد</p>
                                    </div>
                                @endif

                            </div>
                            <div class="row">
                                <div class="colxs-12 col-sm-2 pull-right">
                                    <label>نام درس :</label>
                                </div>
                                @if($list_course['status'] == '350')
                                    <div class="col-xs-12 col-sm-10 pull-right">
                                        <select name="select_course" class="SlectBox selectpicker"
                                                data-style="select-with-transition"
                                                title="انتخاب درس">
                                            @foreach($list_course['list_course'] as $one_course)
                                                <option data-id="{{$one_course['id']}}"
                                                        value="{{(int)$one_course['unit_number']}}">{{$one_course['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <div class="col-xs-12 col-sm-10 pull-right">
                                        <p class="colorRed">هیچ درسی به ثبت نرسیده است.</p>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-sm-2 pull-right">
                                    <label>تعیین گروه :</label>
                                </div>
                                <div class="col-xs-12 col-sm-10 pull-right">
                                    <select name="select_group" class="SlectBox selectpicker" data-style="select-with-transition"
                                            title="انتخاب گروه درسی">
                                        <option value="1">گروه1</option>
                                        <option value="2">گروه 2</option>
                                        <option value="3">گروه 3</option>
                                        <option value="4">گروه 4</option>
                                        <option value="5">گروه 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-sm-2 pull-right">
                                    <label>تعیین استاد :</label>
                                </div>
                                @if($list_professor['status'] == '350')
                                    <div class="col-xs-12 col-sm-10 pull-right">
                                        <select name="select_professor" class="SlectBox selectpicker"
                                                data-style="select-with-transition"
                                                title="انتخاب استاد">
                                            @foreach($list_professor['list_professor'] as $one_professor)
                                                <option value="{{$one_professor['id']}}">{{$one_professor['all_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <div class="col-xs-12 col-sm-10 pull-right">
                                        <p class="colorRed">هیچ استادی وجود ندارد</p>
                                    </div>
                                @endif
                            </div>
                            @if($list_class['status'] == '350')
                                <div class="row time-1">
                                    <div class="col-xs-12 col-sm-2 pull-right">
                                        <label>تعیین زمان و مکان :</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-10 pull-right">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_class" class="SlectBox selectpicker" data-id="1"
                                                        data-style="select-with-transition"
                                                        title="کلاس درسی" required="required">
                                                    @foreach($list_class['list_class'] as $one_class)
                                                        <option value="{{$one_class['id']}}">
                                                            کلاس {{$one_class['number']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_date" data-id="1" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="جلسه اول">
                                                    <option value="1">شنبه</option>
                                                    <option value="2">یکشنبه</option>
                                                    <option value="3">دوشنبه</option>
                                                    <option value="4">سه شنبه</option>
                                                    <option value="5">چهارشنبه</option>
                                                    <option value="6">پنج شنبه</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_time" data-id="1" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="ساعت جلسه اول">
                                                    <option value="1">8-10</option>
                                                    <option value="2">10-12</option>
                                                    <option value="3">12-14</option>
                                                    <option value="4">14-16</option>
                                                    <option value="5">16-18</option>
                                                    <option value="6">18-20</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row time-2 display-none">
                                    <div class="colxs-12 col-sm-2 pull-right">
                                        <label>تعیین زمان :</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-10">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3 pull-right">
                                                <select name="select_class" data-id="2" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="کلاس درسی">
                                                    @foreach($list_class['list_class'] as $one_class)
                                                        <option value="{{$one_class['id']}}">
                                                            کلاس {{$one_class['number']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 pull-right">
                                                <select name="select_date" data-id="2" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="جلسه اول">
                                                    <option value="1">شنبه</option>
                                                    <option value="2">یکشنبه</option>
                                                    <option value="3">دوشنبه</option>
                                                    <option value="4">سه شنبه</option>
                                                    <option value="5">چهارشنبه</option>
                                                    <option value="6">پنج شنبه</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 pull-right">
                                                <select name="select_time" data-id="2" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="ساعت جلسه اول">
                                                    <option value="1">8-10</option>
                                                    <option value="2">10-12</option>
                                                    <option value="3">12-14</option>
                                                    <option value="4">14-16</option>
                                                    <option value="5">16-18</option>
                                                    <option value="6">18-20</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 pull-right">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="option_day" value="1"
                                                               data-title="one"> هفته در
                                                        میان
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3 pull-right">
                                                <select name="select_class" data-id="3" class="SlectBox  selectpicker"
                                                        data-style="select-with-transition"
                                                        title="کلاس درسی">
                                                    @foreach($list_class['list_class'] as $one_class)
                                                        <option value="{{$one_class['id']}}">
                                                            کلاس {{$one_class['number']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 pull-right">
                                                <select name="select_date" data-id="3" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="جلسه دوم">
                                                    <option value="1">شنبه</option>
                                                    <option value="2">یکشنبه</option>
                                                    <option value="3">دوشنبه</option>
                                                    <option value="4">سه شنبه</option>
                                                    <option value="5">چهارشنبه</option>
                                                    <option value="6">پنج شنبه</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 pull-right">
                                                <select name="select_time" data-id="3" class=" selectpicker SlectBox"
                                                        data-style="select-with-transition"
                                                        title="ساعت جلسه دوم">
                                                    <option value="1">8-10</option>
                                                    <option value="2">10-12</option>
                                                    <option value="3">12-14</option>
                                                    <option value="4">14-16</option>
                                                    <option value="5">16-18</option>
                                                    <option value="6">18-20</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 pull-right">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="option_day" value="2"
                                                               data-title="two"> هفته در
                                                        میان
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row time-4 display-none">
                                    <div class="colxs-12 col-sm-2 pull-right">
                                        <label>تعیین زمان :</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-10">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_class" data-id="4" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="کلاس درسی">
                                                    @foreach($list_class['list_class'] as $one_class)
                                                        <option value="{{$one_class['id']}}">
                                                            کلاس {{$one_class['number']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_date" data-id="4" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="جلسه اول">
                                                    <option value="1">شنبه</option>
                                                    <option value="2">یکشنبه</option>
                                                    <option value="3">دوشنبه</option>
                                                    <option value="4">سه شنبه</option>
                                                    <option value="5">چهارشنبه</option>
                                                    <option value="6">پنج شنبه</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_time" data-id="4" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="ساعت جلسه اول">
                                                    <option value="1">8-10</option>
                                                    <option value="2">10-12</option>
                                                    <option value="3">12-14</option>
                                                    <option value="4">14-16</option>
                                                    <option value="5">16-18</option>
                                                    <option value="6">18-20</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_class" data-id="5" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="کلاس درسی">
                                                    @foreach($list_class['list_class'] as $one_class)
                                                        <option value="{{$one_class['id']}}">
                                                            کلاس {{$one_class['number']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_date" data-id="5" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="جلسه دوم">
                                                    <option value="1">شنبه</option>
                                                    <option value="2">یکشنبه</option>
                                                    <option value="3">دوشنبه</option>
                                                    <option value="4">سه شنبه</option>
                                                    <option value="5">چهارشنبه</option>
                                                    <option value="6">پنج شنبه</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_time" data-id="5" class="SlectBox  selectpicker"
                                                        data-style="select-with-transition"
                                                        title="ساعت جلسه دوم">
                                                    <option value="1">8-10</option>
                                                    <option value="2">10-12</option>
                                                    <option value="3">12-14</option>
                                                    <option value="4">14-16</option>
                                                    <option value="5">16-18</option>
                                                    <option value="6">18-20</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row time-3 display-none">
                                    <div class="colxs-12 col-sm-2 pull-right">
                                        <label>تعیین زمان و کلاس :</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-10">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_class" data-id="6" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="کلاس درسی">
                                                    @foreach($list_class['list_class'] as $one_class)
                                                        <option value="{{$one_class['id']}}">
                                                            کلاس {{$one_class['number']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_date" data-id="6" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="جلسه اول">
                                                    <option value="1">شنبه</option>
                                                    <option value="2">یکشنبه</option>
                                                    <option value="3">دوشنبه</option>
                                                    <option value="4">سه شنبه</option>
                                                    <option value="5">چهارشنبه</option>
                                                    <option value="6">پنج شنبه</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_time" data-id="6" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="ساعت جلسه اول">
                                                    <option value="1">8-10</option>
                                                    <option value="2">10-12</option>
                                                    <option value="3">12-14</option>
                                                    <option value="4">14-16</option>
                                                    <option value="5">16-18</option>
                                                    <option value="6">18-20</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_date" data-id="7" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="جلسه دوم">
                                                    <option value="1">شنبه</option>
                                                    <option value="2">یکشنبه</option>
                                                    <option value="3">دوشنبه</option>
                                                    <option value="4">سه شنبه</option>
                                                    <option value="5">چهارشنبه</option>
                                                    <option value="6">پنج شنبه</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_class" data-id="7" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="کلاس درسی">
                                                    @foreach($list_class['list_class'] as $one_class)
                                                        <option value="{{$one_class['id']}}">
                                                            کلاس {{$one_class['number']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_time" data-id="7" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="ساعت جلسه دوم">
                                                    <option value="1">8-10</option>
                                                    <option value="2">10-12</option>
                                                    <option value="3">12-14</option>
                                                    <option value="4">14-16</option>
                                                    <option value="5">16-18</option>
                                                    <option value="6">18-20</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select class="selectpicker" name="select_class" data-id="8"
                                                        data-style="select-with-transition"
                                                        title="کلاس درسی">
                                                    @foreach($list_class['list_class'] as $one_class)
                                                        <option value="{{$one_class['id']}}">
                                                            کلاس {{$one_class['number']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_date" data-id="8" class="SlectBox selectpicker"
                                                        data-style="select-with-transition"
                                                        title="جلسه سوم">
                                                    <option value="1">شنبه</option>
                                                    <option value="2">یکشنبه</option>
                                                    <option value="3">دوشنبه</option>
                                                    <option value="4">سه شنبه</option>
                                                    <option value="5">چهارشنبه</option>
                                                    <option value="6">پنج شنبه</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 pull-right">
                                                <select name="select_time" data-id="8" class="SlectBox selectpicker" data-style="select-with-transition" title="ساعت جلسه سوم">
                                                    <option value="1">8-10</option>
                                                    <option value="2">10-12</option>
                                                    <option value="3">12-14</option>
                                                    <option value="4">14-16</option>
                                                    <option value="5">16-18</option>
                                                    <option value="6">18-20</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="colxs-12 col-sm-2 pull-right">
                                        <label>تعیین زمان و کلاس :</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-10">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 pull-right">
                                                <p class="colorRed">هیچ کلاسی وجود ندارد.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="colxs-12 col-sm-2 pull-right">
                                    <label>ظرفیت :</label>
                                </div>
                                <div class="col-xs-12 col-sm-10 pull-right">
                                    <input name="capacity_select" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-sm-2 pull-right">
                                    <label>حداقل ظرفیت :</label>
                                </div>
                                <div class="col-xs-12 col-sm-10 pull-right">
                                    <input name="capacity_min_select" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-sm-2 pull-right">
                                    <label>زمان امتحان :</label>
                                </div>
                                <div class="col-xs-12 col-sm-4 pull-right">
                                    <input id="date_exam" name="date_exam" class="form-control">
                                </div>
                                <div class="colxs-12 col-sm-2 pull-right">
                                    <label>ساعت امتحان :</label>
                                </div>
                                <div class="col-xs-12 col-sm-4 pull-right">
                                    <input name="time_exam" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-sm-2 pull-right">
                                    <label>سایر ورودی ها :</label>
                                </div>
                                @if($list_semester['status'] == '350')
                                    <div class="col-xs-12 col-sm-10 pull-right">
                                        <select name="select_guest" class="selectpicker"
                                                data-style="select-with-transition"
                                                multiple="multiple" title="انتخاب ورودی">
                                            @foreach($list_semester['list_semester'] as $one_semester)
                                                <option value="1">{{$one_semester}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                @else
                                    <div class="col-xs-12 col-sm-10 pull-right">
                                        <p class="colorRed">هیچ دانشجویی وجود ندارد</p>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <input name="save_available_course" type="button"
                                       class="btn btn-primary pull-left submit_button" value="ثبت">
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
            kamaDatepicker('date_exam', {
                nextButtonIcon: "fa fa-angle-right"
                , previousButtonIcon: "fa fa-angle-left"
                , forceFarsiDigits: true
                , markToday: true
                , markHolidays: true
                , highlightSelectedDay: true
                , sync: true
                , gotoToday: true
            });
            var save_course = $('input[name="save_available_course"]');
            var semester = $('select[name="semester"] ');
            var select_course = $('select[name="select_course"]');
            var select_guest = $('select[name="select_guest"]');
            var select_professor = $('select[name="select_professor"] ');
            var $term_now = $('input[name="term_now"]').val();
            if (semester.text() == '' || select_course.text() == '' || select_professor.text() == '' || select_guest.text() == '') {
                save_course.attr('disabled', 'disabled');
            }
            $('select[name="select_date"]').change(function () {
                var data = {};
                var data_id = $(this).attr('data-id');
                var selected_date = $('select[name="select_date"][data-id=' + '"' + data_id + '"] :selected').val();
                var select_class = $('select[name="select_class"][data-id=' + '"' + data_id + '"] :selected').val();
                if (select_class == '') {
                    select_class = null;
                }
                data.status = 'check';
                data.name_class = select_class;
                data.date = selected_date;
                data._token = "{{csrf_token()}}";
                $.ajax({
                    url: "/admin/course/available/new/post",
                    type: "POST",
                    data: data,
                    success: function (response) {
                        if (response['status']) {
                            console.log(response['list_time']);
                            for (i = 0; i < response['list_time'].length; i++) {
                                $('select[name="select_time"][data-id=' + '"' + data_id + '"] option[value=' + '"' + response['list_time'][i] + '"]').prop('disabled', true);
                            }
                        } else {

                        }
                    },
                    error: function () {
                        alert("Error.........")
                    },
                    complete: function () {
                    }
                });
            });

            select_course.change(function (event) {
                if ($(this).val() == 1 || $(this).val() == 2) {
                    $('.time-2').hide();
                    $('.time-3').hide();
                    $('.time-4').hide();
                    $('.time-1').show();
                }
                if ($(this).val() == 3) {
                    $('.time-1').hide();
                    $('.time-3').hide();
                    $('.time-4').hide();
                    $('.time-2').show();
                }
                if ($(this).val() == 4) {
                    $('.time-1').hide();
                    $('.time-2').hide();
                    $('.time-3').hide();
                    $('.time-4').show();
                }
                if ($(this).val() == 6) {
                    $('.time-1').hide();
                    $('.time-2').hide();
                    $('.time-4').hide();
                    $('.time-3').show();
                }
                var data = {};
                var id_course = $('select[name="select_course"]  :selected').attr('data-id');
                data.status = 'exam_course';
                data.id_course = id_course;
                data._token = "{{csrf_token()}}";
                $.ajax({
                    url: "/admin/course/available/new/post",
                    type: "POST",
                    data: data,
                    success: function (response) {
                        if (response['status']) {
                            var date_exam = $('input[name="date_exam"]');
                            var time_exam = $('input[name="time_exam"]');
                            if (response['date_exam'] == false) {
                                date_exam.attr('placeholder', 'هیچ زمانی از قبل برای این درس ثبت نشده است.')
                                time_exam.attr('placeholder', 'هیچ زمانی از قبل برای این درس ثبت نشده است.')
                            } else {
                                date_exam.attr('placeholder', response['date_exam'])
                                time_exam.attr('placeholder', response['time_exam'])
                            }
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
            });


            save_course.click(function () {
                var data = {};
                var list_day = [];
                var list_classes = [];
                var list_time = [];
                var list_guest = [];
                data.status = 'new';
                data.semester = semester.val();
                data.term_now = $term_now;
                data.id_course = $('select[name="select_course"]  :selected').attr('data-id');
                data.group = $('select[name="select_group"]  :selected').val();
                data.id_professor = $('select[name="select_professor"]  :selected').val();
                for (var i = 1; i <= 8; i++) {
                    var date = $('select[name="select_date"][data-id="' + i + '"]').val();
                    if (date == '') {

                    } else {
                        var classes = $('select[name="select_class"][data-id="' + i + '"]').val();
                        if (classes == '') {

                        } else {
                            var time = $('select[name="select_time"][data-id="' + i + '"]').val();
                            if (time == '') {

                            } else {
                                list_day.push(date);
                                list_classes.push(classes);
                                list_time.push(time);
                            }
                        }

                    }
                }
                var checked_day = $('input[name="option_day"]:checked').val();
                if (checked_day == null) {
                    checked_day = ''
                }
                data.list_day = JSON.stringify(list_day);
                data.list_classes = JSON.stringify(list_classes);
                data.list_time = JSON.stringify(list_time);
                data.checked_day = checked_day;
                data.date_exam = $('input[name="date_exam"]').val();
                data.time_exam = $('input[name="time_exam"]').val();
                data.capacity = $('input[name="capacity_select"]').val();
                data.min_capacity = $('input[name="capacity_min_select"]').val();
                $('select[name="select_guest"] :selected').each(function (i, selected) {
                    list_guest[i] = $(selected).text();
                });
                data.list_guest = JSON.stringify(list_guest);
                data._token = "{{csrf_token()}}";
                $.ajax({
                    url: "/admin/course/available/new/post",
                    type: "POST",
                    data: data,
                    success: function (response) {
                        if (response['status']) {
                            swal("ثبت شد!", response['msg'], "success");
                            $('button[class="confirm"]').click(function () {
                                location.reload();
                            })
                        } else {
                            swal("خطا", response['msg'], "error");
                            $('button[class="confirm"]').click(function () {
//                                location.reload();
                            })
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