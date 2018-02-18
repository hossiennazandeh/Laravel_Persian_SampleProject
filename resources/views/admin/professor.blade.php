@extends("admin.base.base")
@section('title')
    مدیریت اساتید
@endsection
@section('css')
    <script src="{{asset('dist/js/pagination.js')}}" type="text/javascript"></script>
@endsection
@section('header')
    مدیریت اساتید
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/admin/professor/new">
                        <input type="button" class="btn btn-primary pull-right" value="ثبت نام استاد">
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">مدیریت محتوی اساتید</h4>
                    <p class="category">لیست اساتید در حال تدریس در مرکز</p>
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
                                @if($professor == false)
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 pull-right">
                                            <div class="alert alert-info alert-with-icon" data-notify="container">
                                                <i data-notify="icon" class="flaticon-info-sign"></i>
                                                <span data-notify="message">هیچ استادی یافت نشد. لطفا استاد جدیدی وارد کنید.</span>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                            <tr>
                                                <th class="col-xs-2 text-right">ردیف</th>
                                                <th class="col-xs-3 text-right">نام و نام خانوادگی</th>
                                                <th class="col-xs-2 text-right">کد ملی</th>
                                                <th class="col-xs-3 text-right">عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody data-content="content_table">
                                            @foreach($professor as $one_professor)
                                                <tr data-status="">
                                                    <td>{{$counter_professor = $counter_professor +1}}</td>
                                                    <td data-id=""
                                                        class="">{{$one_professor->firstname}} {{$one_professor->lastname}}</td>
                                                    <td  class="">{{$one_professor->national_code}}</td>
                                                    <td class="actional">
                                                    <span data-id="{{$one_professor->id}}" data-title="delete_professor"
                                                          class="flaticon-trash-2 delete_student_button"
                                                          data-toggle="tooltip" title="حذف"></span>
                                                        &#160;
                                                        <a href="/admin/professor/edit/{{$one_professor->id}}"
                                                           data-toggle="tooltip"
                                                           title="ویرایش">
                                                            <span class="flaticon-pencil-and-paper"></span>
                                                        </a>
                                                        &#160;
                                                        <a href="/admin/professor/course/{{$one_professor->id}}" data-toggle="tooltip"
                                                           title="لیست دروس"><span class="flaticon-data-viewer"></span></a>
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
    <script type="text/javascript">
        var all_page = Math.floor({{$all_page}});
        var page_now = Math.floor({{$page_now}});
        paginate(".pagination", all_page, page_now, 7, "/admin/professor/list");
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $("span[data-title='delete_professor']").click(function (e) {
                var $tr = $(this).closest('tr');
                var id = $(this).attr('data-id');
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
                            url: "/admin/professor/list/post",
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
            $("input[name='search_professor']").keyup(function (event) {
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
                        url: "/admin/professor/list/post",
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
                                    html_string += '<td class="">' + response['data'][i].national_code + '</td>';
                                    html_string += '<td class="actional">';
                                    html_string += '<span data-id="'+ response['data'][i].id+'" data-title="delete_professor" class="flaticon-trash-2 delete_student_button" data-toggle="tooltip" title="حذف"></span>';
                                    html_string += ' &#160;';
                                    html_string += '<a href="/admin/professor/edit/'+ response['data'][i].id+'" data-toggle="tooltip" title="ویرایش">';
                                    html_string += '<span class="flaticon-pencil-and-paper"></span>';
                                    html_string += '&#160;';
                                    html_string += '<a href="/admin/professor/course/'+response['data'][i].id +'" data-toggle="tooltip" title="لیست دروس"><span class="flaticon-data-viewer"></span></a></td>';
                                    html_string += '</tr>';
                                }
                                html_string += '</tbody>';
                                $('tbody[data-title="search"]').remove();
                                table.append(html_string);
                                $("span[data-title='delete_professor']").click(function (e) {
                                    var $tr = $(this).closest('tr');
                                    var id = $(this).attr('data-id');
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
                                                url: "/admin/professor/list/post",
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