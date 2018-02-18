@extends("student.base.base")
@section('title')
    دروس ارائه شده
@endsection
@section('navbar-title')
    دروس ارائه شده
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    لیست دروس ارائه شده
                </div>
                <div class="card-body">
                    @if($course == false)
                    @else
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                        <tr>
                                            <th class="col-xs-1 text-right">ردیف</th>
                                            <th class="col-xs-1 text-right">گروه</th>
                                            <th class="col-xs-2 text-right">عنوان درس</th>
                                            <th class="col-xs-1 text-right">واحد</th>
                                            <th class="col-xs-2 text-right">ثبت نام شده</th>
                                            <th class="col-xs-1 text-right">ظرفیت</th>
                                            <th class="col-xs-2 text-right">نام استاد</th>
                                            <th class="col-xs-1 text-right"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($course as $one_course)
                                            <tr data-status="">
                                                <td>{{$count += 1}}</td>
                                                <td class="">{{$one_course['group_number']}}</td>
                                                <td class="">{{$one_course['name_course']}}</td>
                                                <td class="">{{$one_course['unit_number']}}</td>
                                                <td class="">{{$one_course['count_have_course']}}</td>
                                                <td class="">{{$one_course['capacity']}}</td>
                                                <td class="">{{$one_course['firstname']}} {{$one_course['lastname']}}</td>
                                                <td class="actional">
                                            <span data-toggle="tooltip" title="اطلاعات"
                                                  class="flaticon-info-sign info-btn"></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="info_course" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">تجوید گروه 2</h4>
                </div>
                <div class="modal-body">
                    <P>
                        <span>جلسه اول روز : </span><span>شنبه ساعت 8</span>
                    </P>
                    <span>جلسه اول روز : </span><span>شنبه ساعت 8</span>
                    <p>
                    </p>
                    <p>
                        <span>امتحان روز : </span><span>شنبه ساعت 8</span>
                    </p>
                    <p>
                        <span>قابل اتخاب برای دانشجویان : </span><span>مهر 95 و ماقبل</span>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.info-btn').click(function () {
                $('#info_course').modal('show')
            })
        });

    </script>
@endsection