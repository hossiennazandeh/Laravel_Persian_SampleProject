@extends("admin.base.base")
@section('title')
    مدیریت دروس
@endsection
@section('css')
    <script src="{{asset('dist/js/pagination.js')}}" type="text/javascript"></script>
@endsection
@section('header')
    مدیریت دروس
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/admin/course/new">
                        <input type="button" class="btn btn-primary pull-right" value="افزودن درس">
                    </a>
                    <a href="{{\Illuminate\Support\Facades\URL::to("/admin/course/available/list/1")}}">
                        <input type="button" class="btn btn-success pull-right" value="مدیریت دروس ارائه شده ترم جاری">
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">مدیریت محتوی دروس</h4>
                    <p class="category">لیست دروس موجود در مرکز</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                        {{--<div class="row">--}}
                            {{--<div class="colxs-12 col-md-2 pull-right">--}}
                                {{--<label>جستجو :</label>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-12 col-md-10 pull-right">--}}
                                {{--<input name="title" class="form-control">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        @if($course == false)
                            <div class="row">
                                <div class="col-xs-12 col-md-6 pull-right">
                                    <div class="alert alert-info alert-with-icon" data-notify="container">
                                        <i data-notify="icon" class="flaticon-info-sign"></i>
                                        <span data-notify="message">هیچ درسی یافت نشد. لطفا درس جدیدی وارد کنید.</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                    <tr>
                                        <th class="col-xs-1 text-right">ردیف</th>
                                        <th class="col-xs-2 text-right">عنوان درس</th>
                                        <th class="col-xs-2 text-right">نحوه ارائه</th>
                                        <th class="col-xs-2 text-right">نوع</th>
                                        <th class="col-xs-1 text-right">واحد</th>
                                        <th class="col-xs-2 text-right">شهریه(تومان)</th>
                                        <th class="col-xs-2 text-right">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($course as $one_course)
                                        <tr data-status="">
                                            <td>{{$counter_course = $counter_course +1}}</td>
                                            <td data-id=""
                                                class="">{{$one_course->name}}</td>
                                            <td class="">{{$one_course->presentation}}</td>
                                            <td class="">{{$one_course->type}}</td>
                                            <td class="">{{$one_course->unit_number}}</td>
                                            <td class="">{{$one_course->price}}</td>
                                            <td class="actional">
                                                <span data-id="{{$one_course->id}}" data-title="delete_course"
                                                      class="flaticon-trash-2 delete_student_button"
                                                      data-toggle="tooltip" title="حذف"></span>
                                                &#160;
                                                <a href="/admin/course/edit/{{$one_course->id}}" data-toggle="tooltip"
                                                   title="ویرایش">
                                                    <span class="flaticon-pencil-and-paper"></span>
                                                </a>
                                                {{--&#160;--}}
                                                {{--<a href="#" data-toggle="tooltip" title="لیست دروس"><span class="flaticon-data-viewer"></span></a>--}}
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
        $(document).ready(function () {
            var all_page = Math.floor({{$all_page}});
            var page_now = Math.floor({{$page_now}});
            paginate(".pagination", all_page, page_now, 7, "/admin/course/list");
            $('[data-toggle="tooltip"]').tooltip();
            $("span[data-title='delete_course']").click(function (e) {
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
                        data._token = "{{csrf_token()}}";
                        $.ajax({
                            url: "/admin/course/list/post",
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