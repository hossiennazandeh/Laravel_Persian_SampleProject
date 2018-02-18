@extends("admin.base.base")
@section('title')
    مدیریت دانشجویان
@endsection
@section('css')
    <script src="{{asset('dist/js/pagination.js')}}" type="text/javascript"></script>
@endsection

@section('header')
    مدیریت دانشجویان
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/admin/student/new">
                        <input type="button" class="btn btn-primary pull-right" value="ثبت نام دانشجو">
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">مدیریت محتوی دانشجویان</h4>
                    <p class="category">لیست دانشجو های عضو در مرکز</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                        <div class="row">
                            <div class="colxs-12 col-md-2 pull-right">
                                <label>وضعیت دانشجو :</label>
                            </div>
                            <div class="col-xs-12 col-md-10 pull-right">
                                <select id="commodity_situation" class="selectpicker" data-style="select-with-transition" title="انتخاب وضعیت" required="required">
                                    @if($condition == 'all')
                                        <option value="" selected>همه</option>
                                        <option value="">در حال تحصیل</option>
                                        <option value="">معلق</option>
                                        <option value="">اخراج شده</option>
                                        <option value="">فارغ التحصیل</option>
                                    @elseif($condition == 'active')
                                        <option value="">همه</option>
                                        <option value="" selected>در حال تحصیل</option>
                                        <option value="">معلق</option>
                                        <option value="">اخراج شده</option>
                                        <option value="">فارغ التحصیل</option>
                                    @elseif($condition == 'non_active')
                                        <option value="">همه</option>
                                        <option value="">در حال تحصیل</option>
                                        <option value="" selected>معلق</option>
                                        <option value="">اخراج شده</option>
                                        <option value="">فارغ التحصیل</option>
                                    @elseif($condition == 'expulsion')
                                        <option value="">همه</option>
                                        <option value="">در حال تحصیل</option>
                                        <option value="">معلق</option>
                                        <option value="" selected>اخراج شده</option>
                                        <option value="">فارغ التحصیل</option>
                                    @else
                                        <option value="">همه</option>
                                        <option value="">در حال تحصیل</option>
                                        <option value="">معلق</option>
                                        <option value="">اخراج شده</option>
                                        <option value="" selected>فارغ التحصیل</option>
                                    @endif
                                </select>
                                <a class="display-none" id="goUrl" href="#"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="colxs-12 col-md-2 pull-right">
                                <label>جستجو :</label>
                            </div>
                            <div class="col-xs-12 col-md-10 pull-right">
                                <input name="search_student" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                @if($student == false)
                                    @if($condition == 'all')
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6 pull-right">
                                                <div class="alert alert-info alert-with-icon" data-notify="container">
                                                    <i data-notify="icon" class="flaticon-info-sign"></i>
                                                    <span data-notify="message">هیچ دانشجویی یافت نشد. لطفا دانشجوی جدیدی وارد کنید.</span>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($condition == 'active')
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6 pull-right">
                                                <div class="alert alert-info alert-with-icon" data-notify="container">
                                                    <i data-notify="icon" class="flaticon-info-sign"></i>

                                                    <span data-notify="message">هیچ دانشجوی در حال تحصیلی یافت نشد.</span>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($condition == 'non_active')
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6 pull-right">
                                                <div class="alert alert-info alert-with-icon" data-notify="container">
                                                    <i data-notify="icon" class="flaticon-info-sign"></i>

                                                    <span data-notify="message">هیچ دانشجوی تعلیق شده ای یافت نشد.</span>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6 pull-right">
                                                <div class="alert alert-info alert-with-icon" data-notify="container">
                                                    <i data-notify="icon" class="flaticon-info-sign"></i>

                                                    <span data-notify="message">هیچ دانشجوی اخراج شده ای  یافت نشد. </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="table-responsive">
                                        <table id=""
                                               class="table">
                                            <thead class="text-primary">
                                            <tr>
                                                <th class="col-xs-2 text-right">ردیف</th>
                                                <th class="col-xs-3 text-right">نام و نام خانوادگی</th>
                                                <th class="col-xs-2 text-right">شماره دانشجویی</th>
                                                <th class="col-xs-2 text-right">وضعیت</th>
                                                <th class="col-xs-3 text-right">عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody data-content="content_table">
                                            @foreach($student as $one_student)
                                                <tr data-status="">
                                                    <td>{{$counter_student = $counter_student +1 }}</td>
                                                    <td data-id=""
                                                        class="">{{$one_student->firstname}} {{$one_student->lastname}}</td>
                                                    <td class="">{{$one_student->student_number}}</td>
                                                    <td class="">
                                                        @if($one_student->status == 'active')
                                                            در حال تحصیل
                                                        @elseif($one_student->status == 'non_active')
                                                            معلق
                                                        @elseif($one_student->status == 'expulsion')
                                                            اخراج شده
                                                        @else
                                                            فارغ التحصیل
                                                        @endif
                                                    </td>
                                                    <td class="actional">
                                                        <span data-id="{{$one_student->student_number}}" data-title="delete_student"
                                                              class="flaticon-trash-2 delete_student_button"
                                                              data-toggle="tooltip" title="حذف"></span>
                                                        &nbsp;
                                                        <a href="/admin/student/edit/{{$one_student->student_number}}"
                                                           data-toggle="tooltip"
                                                           title="ویرایش">
                                                            <span class="flaticon-pencil-and-paper"></span>
                                                        </a>
                                                        &#160;
                                                        <a href="/admin/student/semester/list/{{$one_student->student_number}}" data-toggle="tooltip"
                                                           title="مدیریت ترم"><span class="flaticon-online-course"></span></a>
                                                        &#160;
                                                        <a href="/admin/student/financial_record" data-toggle="tooltip"
                                                           title="سابقه مالی"><span class="flaticon-notebook"></span></a>
                                                    </td>
                                                </tr>
                                            @endforeach
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="_alert_">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                class="fa fa-times-circle"></i>&nbsp;</button>
                    <h4 class="modal-title">پیغام</h4>
                </div>
                <div class="modal-body alert_modal_class">
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
            var all_page = Math.floor({{$all_page}});
            var page_now = Math.floor({{$page_now}});
            paginate(".pagination", all_page, page_now, 10, "/admin/student/list/{{$condition}}");
//            $('.SlectBox').SumoSelect();
            $('[data-toggle="tooltip"]').tooltip();
            $("span[data-title='delete_student']").click(function (e) {
                var $tr = $(this).closest('tr');
                var student_number = $(this).attr('data-id');
                swal({
                        title: "آیا شما مطمئن هستید؟",
                        text: "در صورت حذف ، هیچ راه بازگشتی نخواهد بود!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "بله, حذف شود!",
                        closeOnConfirm: false
                    },
                    function () {
                        var data = {};
                        data.student_number = student_number;
                        data.status = 'delete';
                        data._token = "{{csrf_token()}}";
                        $.ajax({
                            url: "/admin/student/list/post",
                            type: "POST",
                            data: data,
                            success: function (response) {
                                if (response['status']) {
                                    $tr.find('td').fadeOut(1000, function () {
                                        $tr.remove();
                                    });
                                    swal("حذف شد!", response['msg'], "success");
                                } else {
                                    swal("لغو شد!", response['msg'], "error");
                                }
                            },
                            error: function () {
                                alert("Error.........")
                            },
                            complete: function () {
                            }
                        });
                    });
            });

            $('select[id="commodity_situation"]').change(function () {
                var select = $(":selected").text();
                if (select == 'همه') {
                    window.location.replace("{{\Illuminate\Support\Facades\URL::to("/admin/student/list/all/1")}}");
                } else if (select == 'در حال تحصیل') {
                    window.location.replace('{{\Illuminate\Support\Facades\URL::to("/admin/student/list/active/1")}}');
                } else if (select == 'معلق') {
                    window.location.replace('{{\Illuminate\Support\Facades\URL::to("/admin/student/list/non_active/1")}}');
                } else if (select == 'اخراج شده') {
                    window.location.replace('{{\Illuminate\Support\Facades\URL::to("/admin/student/list/expulsion/1")}}');
                }
            })
            $("input[name='search_student']").keyup(function (event) {
                event.preventDefault();
                var t_body = $("tbody[data-content='content_table']");
                var table = $('table[class="table"]');
                var item = $(this).val();
                $('tbody[data-title="search"]').fadeOut();
                $('tbody[data-title="search"]').remove();
                if (item == '') {
                    t_body.fadeIn();
                } else {
                    t_body.fadeOut();
                    var data = {};
                    data.item = item;
                    data.status = 'search';
                    data._token = "{{csrf_token()}}";
                    $.ajax({
                        url: "/admin/student/list/post",
                        type: "POST",
                        data: data,
                        success: function (response) {
                            var html_string = '';
                            if (response['status']) {
                                html_string += '<tbody data-title="search">';
                                for (var i = 0; i < response['data'].length; i++) {
                                    html_string += '<tr>';
                                    var counter = i + 1;
                                    html_string += '<td>' + counter+ '</td>';
                                    html_string +='<td class="">' + response['data'][i].firstname+' ' + response['data'][i].lastname+'</td>';
                                    html_string += '<td class="">' + response['data'][i].student_number + '</td>';
                                    html_string += '<td class="">' + response['data'][i].status + '</td>';
                                    html_string += '<td class="actional">';
                                    html_string += '<span data-id="'+ response['data'][i].student_number+'" data-title="delete_student" class="flaticon-trash-2 delete_student_button" data-toggle="tooltip" title="حذف"></span>';
                                    html_string += ' &#160;';
                                    html_string += '<a href="/admin/student/edit/'+ response['data'][i].student_number+'" data-toggle="tooltip" title="ویرایش">';
                                    html_string += '<span class="flaticon-pencil-and-paper"></span>';
                                    html_string += '&#160;';
                                    html_string += '<a href="/admin/student/semester/list/'+ response['data'][i].student_number+'" data-toggle="tooltip" title="مدیریت ترم"><span class="flaticon-data-viewer"></span></a></td>';
                                    html_string += '</tr>';
                                }
                                html_string += '</tbody>';
                                $('tbody[data-title="search"]').remove();
                                table.append(html_string);
                                $("span[data-title='delete_student']").click(function (e) {
                                    var $tr = $(this).closest('tr');
                                    var student_number = $(this).attr('data-id');
                                    swal({
                                            title: "آیا شما مطمئن هستید؟",
                                            text: "در صورت حذف ، هیچ راه بازگشتی نخواهد بود!",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonColor: "#DD6B55",
                                            confirmButtonText: "بله, حذف شود!",
                                            closeOnConfirm: false
                                        },
                                        function () {
                                            var data = {};
                                            data.student_number = student_number;
                                            data.status = 'delete';
                                            data._token = "{{csrf_token()}}";
                                            $.ajax({
                                                url: "/admin/student/list/post",
                                                type: "POST",
                                                data: data,
                                                success: function (response) {
                                                    if (response['status']) {
                                                        $tr.find('td').fadeOut(1000, function () {
                                                            $tr.remove();
                                                        });
                                                        swal("حذف شد!", response['msg'], "success");
                                                    } else {
                                                        swal("لغو شد!", response['msg'], "error");
                                                    }
                                                },
                                                error: function () {
                                                    alert("Error.........")
                                                },
                                                complete: function () {
                                                }
                                            });
                                        });
                                });
                                $('[data-toggle="tooltip"]').tooltip();
                            } else {
                                html_string += '<tbody data-title="search">';
                                html_string += '<td> هیچ موردی یافت نشد.</td>';
                                html_string += '</tbody>';
                                $('tbody[data-title="search"]').remove();
                                table.append(html_string);
                            }
                        },
                        error: function () {
                            alert("Error.........")
                        },
                        complete: function () {
                        }
                    });
                }
            })
        });
    </script>
@endsection