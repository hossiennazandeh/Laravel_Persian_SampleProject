@extends("admin.base.base")
@section('title')
    انتخاب واحد
@endsection
@section('css')
@endsection
@section('header')
    انتخاب واحد
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{\Illuminate\Support\Facades\URL::to("/admin/student/semester/list/{$student->student_number}")}}">
                        <input type="button" class="btn btn-primary pull-right" value="بازگشت">
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">انتخاب واحد برای دانشجویان</h4>
                    <p class="category">برای اتخاب واحد دانشجویان در ترم مشخص، فرم زیر را پر نمایید.</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row margin-bottom-15">
                                    <div class="col-xs-12 col-md-3 pull-right">
                                        <img class="img-responsive img-rounded"
                                             @if($student->img == null)src="{{ asset('img/faces/marc.jpg') }}"
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
                                @if($all_course == false)
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 pull-right">
                                            <div class="alert alert-info alert-with-icon" data-notify="container">
                                                <i data-notify="icon" class="flaticon-info-sign"></i>

                                                <span data-notify="message">هیچ درسی یافت نشد.</span>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @if($list_term['status'] == '350')
                                        <div class="row margin-bottom-5">
                                            <div class="col-xs-12 col-md-6 pull-right">
                                                <select name="semester" id="commodity_situation" class="selectpicker"
                                                        data-style="select-with-transition" title="انتخاب ترم"
                                                        required="required">
                                                    @foreach($list_term['list_term'] as $one_term)
                                                        <option value="{{$one_term->term}}">{{$one_term->term}}@if($one_term->status == 'now')
                                                                (ترم جاری)@endif</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="" class="table">
                                                <thead class="text-primary">
                                                <tr>
                                                    <th class="col-xs-1 text-right">ردیف</th>
                                                    <th class="col-xs-1 text-right">کد درس</th>
                                                    <th class="col-xs-2 text-right">عنوان درس</th>
                                                    <th class="col-xs-1 text-right">واحد</th>
                                                    <th class="col-xs-2 text-right">نوع</th>
                                                    <th class="col-xs-1 text-right">گروه</th>
                                                    <th class="col-xs-2 text-right">شهریه(تومان)</th>
                                                    <th class="col-xs-2 text-right">انتخاب</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($all_course as $one_course)
                                                    <tr data-status="">
                                                        <td>{{$counter +=1}}</td>
                                                        <td data-id="{{$counter}}"
                                                            data-title="{{$one_course['code_course']}}">{{$one_course['code_course']}}</td>
                                                        <td class="">{{$one_course['name_course']}}</td>
                                                        <td class="">{{$one_course['unit_number']}}</td>
                                                        @if($one_course['type_course'] == 'basic')
                                                            <td class="">پایه</td>
                                                        @elseif($one_course['type_course'] == 'public')
                                                            <td class="">عمومی</td>
                                                        @elseif($one_course['type_course'] == 'prime')
                                                            <td class="">اصلی</td>
                                                        @else
                                                            <td class="">تخصصی</td>
                                                        @endif
                                                        <td class="">{{$one_course['group_number']}}</td>
                                                        <td data-role="{{$counter}}"
                                                            class="">{{$one_course['price']}}</td>
                                                        <td class="actional">
                                                            <div class="togglebutton">
                                                                <label>
                                                                    <input name="check_course" data-role="{{$counter}}" data-id="{{$counter}}"
                                                                           type="checkbox">
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="row margin-bottom-15">
                                            <div class="col-xs-12 col-md-2 pull-right">
                                                <label>مجموع قیمت :</label>
                                            </div>
                                            <div class="col-xs-12 col-md-3 pull-right ">
                                                <label data-role="total_pay" class="">0(تومان)</label>
                                            </div>
                                            <div class="col-xs-12 col-md-2 pull-right">
                                                <label>شهریه دروس :</label>
                                            </div>
                                            <div class="col-xs-12 col-md-5 pull-right">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="pay_status" value="paid"> پرداخت
                                                        شده
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="pay_status" value="unpaid" checked>
                                                        پرداخت
                                                        نشده
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row margin-top-15">
                                            <input name="save_semester" data-id="{{$counter}}"
                                                   data-content="{{$student->student_number}}" type="button"
                                                   class="btn btn-primary pull-left submit_button " value="ثبت">
                                        </div>
                                    @else
                                        <div class="row margin-bottom-5">
                                            <div class="col-xs-12 col-md-2 pull-right">
                                                <label>ترم :</label>
                                            </div>
                                            <div class="col-xs-12 col-md-10 pull-right">
                                                <p>هیچ ترمی یافت نشد</p>
                                            </div>
                                        </div>
                                    @endif
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
    <script src="{{asset('js/admin/jquery.select-bootstrap.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var total_price = 0;
            var check_course = $("input[name='check_course']");
            check_course.prop('checked', false);
            check_course.change(function () {
                var check_click = $(this).is(':checked');
                var total_pay = $('label[data-role="total_pay"]');
                var data_role = $(this).data('role');
                var td_price = parseInt($('td[data-role="' + data_role + '"]').text());
                if (check_click == true) {
                    total_price = total_price + td_price
                } else {
                    total_price = total_price - td_price;
                }
                var html_string = total_price + '(تومان)';
                total_pay.empty();
                total_pay.append(html_string);

            });
            $("input[name='save_semester']").click(function (e) {
                var data = {};
                var end_for = $(this).attr('data-id');
                var id_student = $(this).attr('data-content');
                var semester = $('select[name="semester"] :selected').val();
                var status_price = $('input[name="pay_status"]:checked').val();
                var list_code = [];
                for (var i = 1; i <= end_for; i++) {
                    var status_check = $('input[data-id="' + i + '"]')[0].checked;
                    if (status_check) {
                        list_code.push($('td[data-id="' + i + '"]').attr('data-title'));
                    }
                }
                data.status_price = status_price;
                data.semester = semester;
                data.list_code = JSON.stringify(list_code);
                data.id_student = id_student;
                data._token = "{{csrf_token()}}";
                $.ajax({
                    url: "/admin/student/semester/new/post",
                    type: "POST",
                    data: data,
                    success: function (response) {
                        if (response['status']) {
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
    </script>
@endsection