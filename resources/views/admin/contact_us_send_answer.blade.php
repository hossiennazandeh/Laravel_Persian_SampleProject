@extends("admin.base.base")
@section('title')
ارسال پاسخ به کاربر
@endsection
@section('css')

@endsection
@section('header')
    ارسال پاسخ به کاربر
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/admin/contact_us">
                        <input type="button" class="btn btn-primary pull-right" value="برگشت">
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">ارسال پاسخ به پیام کاربر</h4>
                    <p class="category">برای ارسال پاسخ پیام، فرم زیر را پر نمایید.</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                        <div class="row">
                            <div class="colxs-12 col-md-2 pull-right">
                                <label>نام و نام خانوادگی:</label>
                            </div>
                            <div class="col-xs-12 col-md-10 pull-right">
                                <input name="title" class="form-control" value="مهدی علی زاده" disabled="disabled">
                            </div>
                        </div>
                        <div class="row">
                            <div class="colxs-12 col-md-2 pull-right">
                                <label>موضوع :</label>
                            </div>
                            <div class="col-xs-12 col-md-10 pull-right">
                                <input name="title" class="form-control" value="آموزش قرآن" disabled="disabled">
                            </div>
                        </div>
                        <div class="row">
                            <div class="colxs-12 col-md-2 pull-right">
                                <label>ایمیل :</label>
                            </div>
                            <div class="col-xs-12 col-md-10 pull-right">
                                <input name="title" class="form-control" value="m.alizadeh009@gmail.com" disabled="disabled">
                            </div>
                        </div>
                        <div class="row">
                            <div class="colxs-12 col-md-2 pull-right">
                                <label>پیام :</label>
                            </div>
                            <div class="col-xs-12 col-md-10 pull-right">
                                <textarea maxlength="255" name="abstract" class="form-control" disabled="disabled"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="colxs-12 col-md-2 pull-right">
                                <label>عنوان پاسخ :</label>
                            </div>
                            <div class="col-xs-12 col-md-10 pull-right">
                                <input name="title" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="colxs-12 col-md-2 pull-right">
                                <label>متن پاسخ :</label>
                            </div>
                            <div class="col-xs-12 col-md-10 pull-right">
                                <textarea maxlength="255" name="abstract" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <input name="save_news" type="button" class="btn btn-primary pull-left submit_button" value="ارسال">
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
    <div class="modal fade modal_answer">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                    <h4 class="modal-title">ارسال پاسخ</h4>
                </div>
                <div class="modal-body modal_answer_p">
                    <div class="col-xs-12">
                        <label>عنوان</label>
                    </div>
                    <div class="col-xs-12">
                        <input class="form-control title_email" type="text" value="">
                    </div>
                    <div class="col-xs-12">
                        <label>پیام</label>
                    </div>
                    <div class="col-xs-12">
                        <textarea class="form-control content_email" style="resize: vertical"></textarea>
                    </div>
                </div>
                <div class="modal-footer m-text-ltr">
                    <div id="not_valid_status" style="display: none" class="alert alert-danger"></div>
                    <button style="margin-left: 5px" type="button" class="btn btn-success m-right send_email" data-dismiss="modal">ارسال</button>
                    <button type="button" class="btn btn-danger m-right" data-dismiss="modal">انصراف</button>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('.SlectBox').SumoSelect();
            $('.show_contact_button').click(function () {
                $('#_alert_').modal('show')
            })
        });

    </script>
@endsection