@extends("admin.base.base")
@section('title')
    مدیریت ترم دانشجویان
@endsection
@section('css')

@endsection
@section('header')
    مدیریت ترم دانشجویان
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/admin/student/list/all/1">
                        <input type="button" class="btn btn-primary pull-right" value="بازگشت">
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">مدیریت ترم دانشجویان</h4>
                    <p class="category">لیست دروس اخذ شده دانشجو</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row margin-bottom-15">
                                    <div class="col-xs-12 col-md-3 pull-right">
                                        <img class="img-responsive img-rounded"
                                             @if($student->img == null)src="{{ asset('img/default-student.png') }}"
                                             @else src="{{ asset($student->img) }}" @endif />
                                    </div>
                                    <div class="col-xs-12 col-md-9">
                                        <div class="row">
                                            <div class="padding-top-15">
                                                <div class="col-xs-12 col-md-6 pull-right">
                                                    <p>
                                                        <span>نام و نام خانوادگی: </span>
                                                        <span>{{$student->firstname}} {{$student->lastname}} </span>
                                                    </p>
                                                    <p>
                                                        <span>نام پدر: </span>
                                                        <span>{{$student->father}}</span>
                                                    </p>
                                                    <p>
                                                        <span>تاریخ تولد: </span>
                                                        <span>{{$student->brithday}}</span>
                                                    </p>
                                                    <p>
                                                        <span>محل تولد: </span>
                                                        <span>{{$student->location_brith}}</span>
                                                    </p>
                                                </div>
                                                <div class="col-xs-12 col-md-6 pull-right">
                                                    <p>
                                                        <span>کد ملی: </span>
                                                        <span>{{$student->national_code}}</span>
                                                    </p>
                                                    <p>
                                                        <span>شماره شناسنامه: </span>
                                                        <span>{{$student->id}}</span>
                                                    </p>
                                                    <p>
                                                        <span>تلفن: </span>
                                                        <span>{{$student->phone}}</span>
                                                    </p>
                                                    <p>
                                                        <span>موبایل: </span>
                                                        <span>{{$student->mobile}}</span>
                                                    </p>
                                                </div>
                                                <div class="col-xs-12">
                                                    <p>
                                                        <span>آدرس: </span>
                                                        <span>{{$student->address}}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href="/admin/student/semester/new/{{$student->student_number}}">
                                            <input type="button" class="btn btn-success pull-right" value="افزودن درس">
                                        </a>
                                    </div>
                                </div>
                                @if($choice == false)
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 pull-right">
                                            <div class="alert alert-info alert-with-icon" data-notify="container">
                                                <i data-notify="icon" class="flaticon-info-sign"></i>
                                                <span data-notify="message">هیچ درس اخذ شده ای یافت نشد.</span>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table id="" class="table">
                                            <thead class="text-primary">
                                            <tr>
                                                <th class="col-xs-1 text-right">ردیف</th>
                                                <th class="col-xs-2 text-right">ترم</th>
                                                <th class="col-xs-2 text-right">درس</th>
                                                <th class="col-xs-2 text-right">وضعیت</th>
                                                <th class="col-xs-2 text-right">نمره</th>
                                                <th class="col-xs-3 text-right">عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($choice as $one_choice)
                                                <tr data-status="">
                                                    <td>{{$counter += 1}}</td>
                                                    <td data-id="" class="">{{$one_choice->semeter}}</td>
                                                    <td class="">{{$one_choice->name}}</td>
                                                    @if($one_choice->status == 'non_accept')
                                                        <td class="">بدون نمره</td>
                                                    @else
                                                        <td class="">پاس شده</td>
                                                    @endif
                                                    @if($one_choice->score == null)
                                                        <td class="">----</td>
                                                    @else
                                                        <td class="">{{$one_choice->score}}</td>
                                                    @endif
                                                    <td class="actional">
                                                <span data-id="{{$one_choice->id}}" data-title="delete_choice_course"
                                                      class="flaticon-trash-2 delete_student_button"
                                                      data-toggle="tooltip" title="حذف"></span>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <a href="/admin/student/semester/edit/{{$one_choice->id}}" data-toggle="tooltip"
                                                           title="ویرایش">
                                                            <span class="flaticon-pencil-and-paper"></span>
                                                        </a>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        {{--<a href="#" data-toggle="tooltip" title="مدیریت ترم"><span class="flaticon-data-viewer"></span></a>--}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $("span[data-title='delete_choice_course']").click(function (e) {
                var $tr = $(this).closest('tr');
                var data_id = $(this).attr('data-id');
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
                        data.id = data_id;
                        data._token = "{{csrf_token()}}";
                        $.ajax({
                            url: "/admin/student/semester/list/post",
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