@extends("admin.base.base")
@section('title')
سابقه مالی
@endsection
@section('css')
    <script src="{{asset('dist/js/pagination.js')}}" type="text/javascript"></script>
@endsection
@section('header')
    سابقه مالی
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
                    <h4 class="title">مشاهده سابقه مالی</h4>
                    <p class="category">لیست تراکنش های دانشجو</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                        <div class="row">
                            <div class="colxs-12 col-md-2 pull-right">
                                <label>جستجو :</label>
                            </div>
                            <div class="col-xs-12 col-md-10 pull-right">
                                <input name="search_professor" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6 pull-right">
                                        <div class="alert alert-info alert-with-icon" data-notify="container">
                                            <i data-notify="icon" class="flaticon-info-sign"></i>
                                            <span data-notify="message">هیچ تراکنشی یافت نشد.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                        <tr>
                                            <th class="col-xs-2 text-right">ردیف</th>
                                            <th class="col-xs-3 text-right">ترم</th>
                                            <th class="col-xs-2 text-right">شهریه ثابت (تومان)</th>
                                            <th class="col-xs-3 text-right">وضعیت</th>
                                            <th class="col-xs-2 text-right">شهریه دروس</th>
                                        </tr>
                                        </thead>
                                        <tbody data-content="content_table">
                                            <tr data-status="">
                                                <td>1</td>
                                                <td data-id=""
                                                    class="">1395-مهر</td>
                                                <td  class="">22000</td>
                                                <td  class="">پرداخت شده</td>
                                                <td class="actional">
                                                <span data-id="" data-title="delete_professor" class="flaticon-info-sign course_financial" data-toggle="tooltip" title="لیست دروس"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <div class="card-content">
                                            <ul class="pagination"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="course_financial_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close pull-left" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i>&nbsp;</button>
                    <h4 class="modal-title">لیست دروس</h4>
                </div>
                <div class="modal-body alert_modal_class">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                    <tr>
                                        <th class="col-xs-2 text-right">ردیف</th>
                                        <th class="col-xs-3 text-right">نام درس</th>
                                        <th class="col-xs-2 text-right">شهریه (تومان)</th>
                                        <th class="col-xs-3 text-right">وضعیت</th>
                                    </tr>
                                    </thead>
                                    <tbody data-content="content_table">
                                    <tr data-status="">
                                        <td>1</td>
                                        <td data-id=""
                                            class="">تجوید</td>
                                        <td  class="">2500</td>
                                        <td  class="">پرداخت شده</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="not_valid_Guarantee" style="display: none" class="alert alert-danger"></div>
                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="بستن">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('.course_financial').click(function () {
                $('#course_financial_modal').modal('show')
            })
        });
    </script>
@endsection