@extends("admin.base.base")
@section('title')
    افزودن درس
@endsection
@section('css')

@endsection
@section('header')
    افزودن درس
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{\Illuminate\Support\Facades\URL::to("/admin/course/list/1")}}">
                        <input type="button" class="btn btn-primary pull-right" value="بازگشت">
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">افزودن درس</h4>
                    <p class="category">برای افزودن درس، فرم زیر را پر نمایید.</p>
                </div>
                <div class="card-content">
                    <form name="news" class="" enctype='#'>
                        <div class="col-md-10 col-md-offset-1 col-xs-12">
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>عنوان :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="name" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>تعداد واحد :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input type="number" max="6" min="1" name="until_number" value="1"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>زمینه درس :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <select class="selectpicker" name="select_type" data-style="select-with-transition"
                                            title="انتخاب نوع درس">
                                        <option value="public" selected="selected">عمومی</option>
                                        <option value="basic">پایه</option>
                                        <option value="prime">اصلی</option>
                                        <option value="professional">تخصصی</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row margin-bottom-15">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>نوع درس :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="theoretic" name="optionType" checked> تئوری
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="practical" name="optionType"> عملی
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>دروس پیش نیاز :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    @if($pre_course == false)
                                        <p class="colorRed">هیچ درس پیش نیازی وجود ندارد</p>
                                    @else
                                        <select class="selectpicker" name="prerequisite"
                                                data-style="select-with-transition"
                                                multiple title="انتخاب دروس پیش نیاز">
                                            @foreach($pre_course as $one_pre_course)
                                                <option>{{$one_pre_course->name}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>
                            <div class="row margin-bottom-15">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>پیش نیاز بودن :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="yes" name="optionPre" checked> بلی
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="no" name="optionPre" checked> خیر
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>شهریه (تومان) :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input type="number" name="price" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <input name="save_course" type="button" class="btn btn-primary pull-left submit_button"
                                       value="ثبت">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{asset('js/admin/jquery.select-bootstrap.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('input[name="save_course"]').click(function () {
                var data = {};
                var prerequisite = [];
                $('select[name="prerequisite"] :selected').each(function (i, selected) {
                    prerequisite[i] = $(selected).text();
                });
                if(prerequisite.length == 0){
                    prerequisite = '';
                }
                data.name = $('input[name="name"]').val();
                data.unit_number = $('input[name="until_number"]').val();
                data.type = $('select[name="select_type"] :selected').val();
                data.presentation = $('input[name="optionType"]:checked').val();
                data.prerequisite = prerequisite;
                data.status_prerequisite = $('input[name="optionPre"]:checked').val();
                data.price = $('input[name="price"]').val();
                data._token = "{{csrf_token()}}";
                $.ajax({
                    url: "/admin/course/new/post",
                    type: "POST",
                    data: data,
                    success: function (response) {
                        if (response['status']) {
                            swal("ثبت شد!", response['msg'], "success");
                            $('button[class="confirm"]').click(function () {
                                location.reload();
                            })
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
        });
    </script>
@endsection