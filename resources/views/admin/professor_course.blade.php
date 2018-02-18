@extends("admin.base.base")
@section('title')
    لیست دروس اساتید
@endsection
@section('css')

@endsection
@section('header')
    لیست دروس اساتید
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{\Illuminate\Support\Facades\URL::to("/admin/professor/list/1")}}">
                        <input type="button" class="btn btn-primary pull-right" value="بازگشت">
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">لیست دروس اساتید</h4>
                    <p class="category">لیست دروس تدریس شده استاد</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row margin-bottom-15">
                                    <div class="col-xs-12 col-md-3 pull-right">
                                        <img class="img-responsive img-rounded"
                                             @if($professor->img == null)src="{{ asset('img/admin/smsts-refresher-big.png') }}"
                                             @else src="{{ asset($professor->img) }}" @endif />
                                    </div>
                                    <div class="col-xs-12 col-md-9">
                                        <div class="row">
                                            <div class="padding-top-15">
                                                <div class="col-xs-12 col-md-6 pull-right">
                                                    <p>
                                                        <span>نام و نام خانوادگی: </span>
                                                        <span>{{$professor->firstname}} {{$professor->lastname}}</span>
                                                    </p>
                                                    <p>
                                                        <span>نام پدر: </span>
                                                        <span>{{$professor->father}}</span>
                                                    </p>
                                                    <p>
                                                        <span>تاریخ تولد: </span>
                                                        <span>{{$professor->birthday}}</span>
                                                    </p>
                                                    <p>
                                                        <span>محل تولد: </span>
                                                        <span>{{$professor->location_brith}}</span>
                                                    </p>
                                                </div>
                                                <div class="col-xs-12 col-md-6 pull-right">
                                                    <p>
                                                        <span>کد ملی: </span>
                                                        <span>{{$professor->national_code}}</span>
                                                    </p>
                                                    <p>
                                                        <span>شماره شناسنامه: </span>
                                                        <span>{{$professor->id}}</span>
                                                    </p>
                                                    <p>
                                                        <span>تلفن: </span>
                                                        <span>{{$professor->phone}}</span>
                                                    </p>
                                                    <p>
                                                        <span>موبایل: </span>
                                                        <span>{{$professor->mobile}}</span>
                                                    </p>
                                                </div>
                                                <div class="col-xs-12">
                                                    <p>
                                                        <span>آدرس: </span>
                                                        <span>{{$professor->address}}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($list_course == false)
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 pull-right">
                                            <div class="alert alert-info alert-with-icon" data-notify="container">
                                                <i data-notify="icon" class="flaticon-info-sign"></i>
                                                <span data-notify="message">هیچ درس تدریس شده ای یافت نشد.</span>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table id="" class="table">
                                            <thead class="text-primary">
                                            <tr>
                                                <th class="col-xs-2 text-right">ردیف</th>
                                                <th class="col-xs-3 text-right">ترم</th>
                                                <th class="col-xs-3 text-right">درس</th>
                                                <th class="col-xs-3 text-right">گروه</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($list_course as $one_course)
                                                <tr data-status="">
                                                    <td>{{$counter +=1}}</td>
                                                    <td data-id="" class="">{{$one_course['semester']}}</td>
                                                    <td class="">{{$one_course['name_course']}}</td>
                                                    <td class="">{{$one_course['group_number']}}</td>
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
        });
    </script>
@endsection