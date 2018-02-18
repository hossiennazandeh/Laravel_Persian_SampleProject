@extends("admin.base.base")
@section('title')
ویرایش درس اخذ شده
@endsection
@section('css')
@endsection
@section('header')
   ویرایش درس اخذ شده
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/admin/student/semester">
                        <input type="button" class="btn btn-primary pull-right" value="بازگشت">
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">ویرایش درس اخذ شده دانشجویان</h4>
                    <p class="category">برای ویرایش درس اخذ شده دانشجویان، فرم زیر را پر نمایید.</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row margin-bottom-15">
                                    <div class="col-xs-12 col-md-3 pull-right">
                                        <img class="img-responsive img-rounded" src="{{ asset('img/faces/marc.jpg') }}" />
                                    </div>
                                    <div class="col-xs-12 col-md-9">
                                        <div class="row">
                                            <div class="padding-top-15">
                                                <div class="col-xs-12 col-md-6 pull-right">
                                                    <p>
                                                        <span>نام و نام خانوادگی: </span>
                                                        <span>مهدی علی زاده</span>
                                                    </p>
                                                    <p>
                                                        <span>نام پدر: </span>
                                                        <span>علی</span>
                                                    </p>
                                                    <p>
                                                        <span>تاریخ تولد: </span>
                                                        <span>73/10/27</span>
                                                    </p>
                                                    <p>
                                                        <span>محل تولد: </span>
                                                        <span>مشهد</span>
                                                    </p>
                                                </div>
                                                <div class="col-xs-12 col-md-6 pull-right">
                                                    <p>
                                                        <span>کد ملی: </span>
                                                        <span>0923004408</span>
                                                    </p>
                                                    <p>
                                                        <span>شماره شناسنامه: </span>
                                                        <span>0923004408</span>
                                                    </p>
                                                    <p>
                                                        <span>تلفن: </span>
                                                        <span>32713058</span>
                                                    </p>
                                                    <p>
                                                        <span>موبایل: </span>
                                                        <span>09158292548</span>
                                                    </p>
                                                </div>
                                                <div class="col-xs-12">
                                                    <p>
                                                        <span>آدرس: </span>
                                                        <span> طلاب، خیابان عسکریه، علامه طباطبایی 16طلاب، خیابان عسکریه، علامه طباطبایی 16</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin-bottom-5">
                                    <div class="colxs-12 col-md-2 pull-right">
                                        <label>نمره :</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10 pull-right">
                                        <input name="" class="form-control">
                                    </div>
                                </div>
                                <div class="row margin-bottom-5">
                                    <div class="colxs-12 col-md-2 pull-right">
                                        <label>وضعیت :</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10 pull-right">
                                        <select id="commodity_situation" class="selectpicker"
                                                data-style="select-with-transition" title="انتخاب وضعیت" required="required">
                                                <option value="" selected>پاس شده</option>
                                                <option value="">مردود</option>
                                                <option value="">بدون نمره</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row margin-bottom-15">
                                    <div class="colxs-12 col-md-2 pull-right">
                                        <label>شهریه درس :</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10 pull-right">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" value="paid"> پرداخت شده
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" value="unpaid" checked> پرداخت نشده
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin-top-15">
                                    <input name="save_semester" type="button" class="btn btn-primary pull-left submit_button" value="ثبت">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

@endsection