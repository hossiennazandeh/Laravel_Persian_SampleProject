@extends("admin.base.base")
@section('title')
 مدیریت انتخاب واحد و حذف و اضافه
@endsection
@section('css')
    <link href="{{asset('dist/css/kamadatepicker.min.css')}}" rel="stylesheet">
@endsection
@section('header')
    مدیریت انتخاب واحد و حذف و اضافه
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            {{--<div class="row">--}}
                {{--<div class="col-xs-12">--}}
                    {{--<a href="{{\Illuminate\Support\Facades\URL::to("/admin/class/list/1")}}">--}}
                        {{--<input type="button" class="btn btn-primary pull-right" value="بازگشت">--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title"> مدیریت انتخاب واحد و حذف و اضافه</h4>
                    <p class="category">برای مدیریت انتخاب واحد و حذف و اضافه، فرم زیر را پر نمایید.</p>
                </div>
                <div class="card-content">
                    <form name="news" class="" enctype='#'>
                        <div class="col-md-10 col-md-offset-1 col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h5 class="background9c9c9">انتخاب واحد</h5>
                                </div>
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>برای ورودی :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <select name="select_guest" class="selectpicker"
                                            data-style="select-with-transition"
                                            multiple="multiple" title="انتخاب ورودی">
                                            <option value="1">1395 و ما قبل</option>
                                            <option value="2">1396 و ما قبل</option>
                                            <option value="3">1394 و ما قبل</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>زمان:</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 pull-right">
                                            <label>از</label>
                                            <input id="date_from_select" name="name_class" class="form-control" title="از تاریخ">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 pull-right">
                                            <label>تا</label>
                                            <input id="date_until_select" name="name_class" class="form-control" title="تا تاریخ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h5 class="background9c9c9">خذف و اضافه</h5>
                                </div>
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>برای ورودی :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <select name="select_guest" class="selectpicker"
                                            data-style="select-with-transition"
                                            multiple="multiple" title="انتخاب ورودی">
                                        <option value="1">1395 و ما قبل</option>
                                        <option value="2">1396 و ما قبل</option>
                                        <option value="3">1394 و ما قبل</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>زمان:</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 pull-right">
                                            <label>از</label>
                                            <input id="date_from" name="name_class" class="form-control" title="از تاریخ">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 pull-right">
                                            <label>تا</label>
                                            <input id="date_until" name="name_class" class="form-control" title="تا تاریخ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <input name="save_class" type="button" class="btn btn-primary pull-left submit_button"
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
            kamaDatepicker('date_from_select', {
                nextButtonIcon: "fa fa-angle-right"
                , previousButtonIcon: "fa fa-angle-left"
                , forceFarsiDigits: true
                , markToday: true
                , markHolidays: true
                , highlightSelectedDay: true
                , sync: true
                , gotoToday: true
            });
            kamaDatepicker('date_until_select', {
                nextButtonIcon: "fa fa-angle-right"
                , previousButtonIcon: "fa fa-angle-left"
                , forceFarsiDigits: true
                , markToday: true
                , markHolidays: true
                , highlightSelectedDay: true
                , sync: true
                , gotoToday: true
            });
            kamaDatepicker('date_from', {
                nextButtonIcon: "fa fa-angle-right"
                , previousButtonIcon: "fa fa-angle-left"
                , forceFarsiDigits: true
                , markToday: true
                , markHolidays: true
                , highlightSelectedDay: true
                , sync: true
                , gotoToday: true
            });
            kamaDatepicker('date_until', {
                nextButtonIcon: "fa fa-angle-right"
                , previousButtonIcon: "fa fa-angle-left"
                , forceFarsiDigits: true
                , markToday: true
                , markHolidays: true
                , highlightSelectedDay: true
                , sync: true
                , gotoToday: true
            });
        });
    </script>
@endsection