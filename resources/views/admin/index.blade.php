@extends("admin.base.base")
@section('title')
خلاصه وضعیت
@endsection

@section('header')
    خلاصه وضعیت
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                    <i class=" flaticon-female-graduate-student"></i>
                </div>
                <div class="card-content">
                    <p class="category">دانشجویان</p>
                    <h3 class="title">{{$count_student}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class=" fa fa-arrow-right"></i> <a href="{{\Illuminate\Support\Facades\URL::to("/admin/student/list/all/1")}}"> بیشتر...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="flaticon-time-1"></i>
                </div>
                <div class="card-content">
                    <p class="category">اخبار</p>
                    <h3 class="title">{{$count_news}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fa fa-arrow-right"></i>
                        <a href="{{\Illuminate\Support\Facades\URL::to("/admin/news/list/1")}}">بیشتر...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="red">
                    <i class="flaticon-teacher-showing-on-whiteboard"></i>
                </div>
                <div class="card-content">
                    <p class="category">اساتید</p>
                    <h3 class="title">{{$count_professor}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fa fa-arrow-right"></i>
                        <a href="{{\Illuminate\Support\Facades\URL::to("/admin/professor/list/1")}}">بیشتر...</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                    <i class="flaticon-open-book"></i>
                </div>
                <div class="card-content">
                    <p class="category">دروس</p>
                    <h3 class="title">{{$count_course}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fa fa-arrow-right"></i>
                        <a href="{{\Illuminate\Support\Facades\URL::to("/admin/course/list/1")}}">بیشتر...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection