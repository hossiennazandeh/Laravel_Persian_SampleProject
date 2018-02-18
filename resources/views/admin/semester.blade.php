@extends("admin.base.base")
@section('title')
    مدیریت ترم ها
@endsection
@section('css')
    <script src="{{asset('dist/js/pagination.js')}}" type="text/javascript"></script>
@endsection
@section('header')
    مدیریت ترم ها
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <input id="add_semester" type="button" class="btn btn-primary pull-right" value="تعریف ترم جدید">
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">مدیریت ترم ها</h4>
                    <p class="category">لیست ترم های موجود</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                @if($semester == false)
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 pull-right">
                                            <div class="alert alert-info alert-with-icon" data-notify="container">
                                                <i data-notify="icon" class="flaticon-info-sign"></i>
                                                <span data-notify="message">هیچ ترمی یافت نشد. </span>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                            <tr>
                                                <th class="col-xs-2 text-right">ردیف</th>
                                                <th class="col-xs-2 text-right">سال</th>
                                                <th class="col-xs-2 text-right">ماه</th>
                                                <th class="col-xs-2 text-right">شهریه</th>
                                                <th class="col-xs-2 text-right">وضعیت</th>
                                                <th class="col-xs-2 text-right">عملیات</th>
                                                <th class="col-xs-2 text-right">فعال سازی</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($semester as $one_semester)
                                                <tr data-status="">
                                                    <td>{{$counter_semester = $counter_semester + 1}}</td>
                                                    <td data-id="" class="">{{$one_semester->year}}</td>
                                                    <td class="">{{$one_semester->month}}</td>
                                                    <td class="">{{$one_semester->price}}</td>
                                                    @if($one_semester->status == 'other')
                                                        <td class="">سایر</td>
                                                    @else
                                                        <td class="">جاری</td>
                                                    @endif
                                                    <td class="actional">
                                                    <span data-id="{{$one_semester->id}}" data-title="delete_semester"
                                                          data-toggle="tooltip"
                                                          title="حذف"
                                                          class="flaticon-trash-2 delete_contact_button"></span>
                                                    </td>
                                                    <td class="actional">
                                                        <div class="togglebutton">
                                                            <label>
                                                                <input @if($one_semester->status == 'now')checked data-role="now_semester"
                                                                       @endif data-id="{{$one_semester->id}}"
                                                                       type="radio" name="check_semester">
                                                            </label>
                                                        </div>
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
    <div class="modal fade" id="show-semester">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close pull-left" data-dismiss="modal" aria-hidden="true"><i
                                class="fa fa-times-circle"></i></button>
                    <h4 class="modal-title">تعریف ترم جدید</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <label>سال :</label>
                    </div>
                    <div class="col-xs-12">
                        <select class="selectpicker" name="select_year" title="انتخاب سال" required="required"
                                data-style="select-with-transition">
                            @foreach($list_year as $one_year)
                                <option value="{{$one_year}}">{{$one_year}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-12">
                        <label>ماه :</label>
                    </div>
                    <div class="col-xs-12">
                        <select name="select_month" class="selectpicker" title="انتخاب ماه" required="required"
                                data-style="select-with-transition">
                            <option value="مهر">مهر</option>
                            <option value="بهمن">بهمن</option>
                            <option value="تیر">تیر</option>
                        </select>
                    </div>
                    <div class="col-xs-12">
                        <label>شهریه (تومان):</label>
                    </div>
                    <div class="col-xs-12">
                        <input class="form-control" name="price_semester" title="شهریه" required="required">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                    <button type="button" data-title="create_semester" class="btn btn-success pull-right"
                            data-dismiss="modal">ثبت
                    </button>
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
            paginate(".pagination", all_page, page_now, 7, "/admin/semester/list");
            $('[data-toggle="tooltip"]').tooltip();
            $('#add_semester').click(function () {
                $('#show-semester').modal('show')
            })
            $('button[data-title="create_semester"]').click(function () {
                var data = {};
                data.year = $('select[name="select_year"] :selected').val();
                data.month = $('select[name="select_month"] :selected').val();
                data.price = $('input[name="price_semester"]').val();
                data.status = 'new_semester';
                data._token = "{{csrf_token()}}";
                $.ajax({
                    url: "/admin/semester/new/post",
                    type: "POST",
                    data: data,
                    success: function (response) {
                        if (response['status']) {
                            swal("ثبت شد!", response['msg'], "success");
                            location.reload();
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
            $('input[name="check_semester"]').change(function () {
                var data_id = $(this).data('id');
                swal({
                        title: "آیا شما مطمئن هستید؟",
                        text: "در صورت تغییر ، تنظیمات در برخی صفحات تغییر خواهد کرد.",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "بله, اعمال شود!",
                        closeOnConfirm: false
                    },
                    function (isConfirm) {
                        if (isConfirm == true) {
                            var data = {};
                            data.id = data_id;
                            data.status = 'change_semester';
                            data._token = "{{csrf_token()}}";
                            $.ajax({
                                url: "/admin/semester/new/post",
                                type: "POST",
                                data: data,
                                success: function (response) {
                                    if (response['status']) {
//                                    swal("ثبت شد!", response['msg'], "success");
                                        location.reload();
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
                        } else {
                            var now_semester = $('input[data-role="now_semester"]');
                            now_semester.prop('checked','checked');

                        }
                    });
            })
            $("span[data-title='delete_semester']").click(function (e) {
                var $tr = $(this).closest('tr');
                var id = $(this).data('id');
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
                        data.id = id;
                        data.status = 'delete';
                        data._token = "{{csrf_token()}}";
                        $.ajax({
                            url: "/admin/semester/new/post",
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
        });

    </script>
@endsection