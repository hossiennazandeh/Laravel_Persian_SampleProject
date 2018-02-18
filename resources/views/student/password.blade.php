@extends("student.base.base")
@section('title')
    تغییر کلمه عبور
@endsection
@section('navbar-title')
    خدمات
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    تغییر کلمه عبور
                </div>
                <div class="card-body">
                    <form name="news" class="" enctype='#'>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 col-xs-12">
                                <div class="row">
                                    <div class="colxs-12 col-md-2 pull-right">
                                        <label>کلمه عبور فعلی :</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10 pull-right">
                                        <input name="last_pass" class="form-control" type="password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="colxs-12 col-md-2 pull-right">
                                        <label>کلمه عبور جدید :</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10 pull-right">
                                        <input name="new_pass" class="form-control" type="password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="colxs-12 col-md-2 pull-right">
                                        <label>تکرار کلمه عبور جدید :</label>
                                    </div>
                                    <div class="col-xs-12 col-md-10 pull-right">
                                        <input name="rep_new_pass" class="form-control" type="password">
                                    </div>
                                </div>
                                <div class="row margin-top-15">
                                    <div class="col-xs-12">
                                        <input name="save_pass" type="button" class="btn btn-primary pull-left submit_button" value="ثبت">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection