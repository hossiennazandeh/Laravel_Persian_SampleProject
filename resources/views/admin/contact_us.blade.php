@extends("admin.base.base")
@section('title')
مدیریت تماس با ما
@endsection
@section('css')

@endsection
@section('header')
    مدیریت تماس با ما
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">مدیریت تماس با ما</h4>
                    <p class="category">لیست پیام های ارسالی کاربران</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                        <div class="row">
                            <div class="colxs-12 col-md-2 pull-right">
                                <label>وضعیت پیام :</label>
                            </div>
                            <div class="col-xs-12 col-md-10 pull-right">
                                <select id="commodity_situation" class="selectpicker"  data-style="select-with-transition" title="انتخاب وضعیت" required="required" >
                                    <option value="">همه</option>
                                    <option value="">پاسخ داده شده</option>
                                    <option value="">پاسخ داده نشده</option>
                                </select>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                        <tr>
                                            <th class="col-xs-1 text-right">ردیف</th>
                                            <th class="col-xs-2 text-right">موضوع</th>
                                            <th class="col-xs-2 text-right">وضعیت</th>
                                            <th class="col-xs-2 text-right">تاریخ</th>
                                            <th class="col-xs-2 text-right">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr data-status="">
                                            <td>1</td>
                                            <td data-id="" class="">آموزش قرآن</td>
                                            <td class="">پاسخداده نشده</td>
                                            <td class="">29 خرداد 96</td>
                                            <td class="actional">
                                                <span data-id="" data-title="delete_news" data-toggle="tooltip" title="حذف" class="flaticon-trash-2 delete_contact_button"></span>
                                                &nbsp; &nbsp;
                                                <a href="/admin/contact_us/answer" data-toggle="tooltip" title="پاسخ دادن"><span class="flaticon-customer-service"></span></a>
                                                &nbsp; &nbsp;
                                                <span data-toggle="tooltip" title="نمایش پیام" class="flaticon-data-viewer show_contact_button"></span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6 pull-right">
                                        <div class="alert alert-info alert-with-icon" data-notify="container">
                                            <i data-notify="icon" class="flaticon-info-sign"></i>

                                            <span data-notify="message">هیچ پیامی یافت نشد. </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        pagination
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="show-massage">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close pull-left" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                    <h4 class="modal-title">پیام</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <label>نام و نام خانوادگی</label>
                    </div>
                    <div class="col-xs-12">
                        <input class="form-control full_name_show_input" type="text" readonly value="">
                    </div>
                    <div class="col-xs-12">
                        <label>موضوع </label>
                    </div>
                    <div class="col-xs-12">
                        <input class="form-control issue_show_input" type="text" readonly value="">
                    </div>
                    <div class="col-xs-12">
                        <label>ایمیل</label>
                    </div>
                    <div class="col-xs-12">
                        <input class="form-control email_show_input" type="email" readonly value="">
                    </div>
                    <div class="col-xs-12">
                        <label>پیام</label>
                    </div>
                    <div class="col-xs-12">
                        <textarea class="form-control text_show_text" readonly></textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger m-left" data-dismiss="modal">بستن
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="_alert_">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                    <h4 class="modal-title">پیغام</h4>
                </div>
                <div class="modal-body">
                    <p></p>
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
    <script src="{{asset('js/admin/jquery.select-bootstrap.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('.show_contact_button').click(function () {
                $('#show-massage').modal('show')
            })
        });

    </script>
@endsection