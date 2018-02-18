@extends("student.base.base")
@section('title')
   حذف و اضافه
@endsection
@section('navbar-title')
آموزشی
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    حذف و اضافه
                </div>
                <div class="card-body">
                    <form name="news" class="" enctype='#'>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 col-xs-12">
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">Ã—</span></button>--}}
                                    <h4 id="oh-snap!-you-got-an-error!">عدم قبول درخواست<a class="anchorjs-link" href="#oh-snap!-you-got-an-error!"><span class="anchorjs-icon"></span></a></h4>
                                    <p>انتخاب درس برای شما به دلایل زیر میسر نمی باشد:</p>
                                    <p>محدوده حذف و اضافه از طریق اینترنت  از 1/4/1396 تا 14/4/1396 ساعت 08 الی 23</p>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                        <tr>
                                            <th class="col-xs-2 text-right">ردیف</th>
                                            <th class="col-xs-2 text-right">گروه</th>
                                            <th class="col-xs-3 text-right">عنوان درس</th>
                                            <th class="col-xs-2 text-right">واحد</th>
                                            <th class="col-xs-2 text-right">انتخاب</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr data-status="">
                                            <td>1</td>
                                            <td class="">2</td>
                                            <td class="">تجوید</td>
                                            <td class="">4</td>
                                            <td class="actional">
                                                <div class="checkbox">
                                                    <input id="checkbox1" type="checkbox">
                                                    <label for="checkbox1">
                                                        انتخاب
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="margin-top-15">
                                    <input name="save_semester" type="button"
                                           class="btn btn-primary pull-left submit_button" value="انتخاب">
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                <h4>دروس انتخاب شده</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                        <tr>
                                            <th class="col-xs-2 text-right">ردیف</th>
                                            <th class="col-xs-2 text-right">گروه</th>
                                            <th class="col-xs-3 text-right">عنوان درس</th>
                                            <th class="col-xs-2 text-right">واحد</th>
                                            <th class="col-xs-2 text-right">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr data-status="">
                                            <td>1</td>
                                            <td class="">2</td>
                                            <td class="">تجوید</td>
                                            <td class="">4</td>
                                            <td class="actional">
                                                <div class="checkbox">
                                                    <input id="checkbox1" type="checkbox">
                                                    <label for="checkbox1">
                                                        انتخاب
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="margin-top-15">
                                    <input name="save_semester" type="button"
                                           class="btn btn-danger pull-left delete_button" value="حذف">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection