@extends("admin.base.base")
@section('title')
    ویرایش درس
@endsection
@section('css')

@endsection
@section('header')
    ویرایش درس
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
                    <h4 class="title">ویرایش درس</h4>
                    <p class="category">برای ویرایش درس، فرم زیر را پر نمایید.</p>
                </div>
                <div class="card-content">
                    <form name="news" class="" enctype='#'>
                        <div class="col-md-10 col-md-offset-1 col-xs-12">
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>عنوان :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="name" class="form-control" value="{{$course->name}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>تعداد واحد :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input type="number" max="6" min="1" name="until_number" class="form-control"
                                           value="{{(int)$course->unit_number}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>نوع :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <select class="selectpicker" name="select_type" data-style="select-with-transition"
                                            title="انتخاب نوع درس">
                                        @if($course->type == 'basic')
                                            <option value="public">عمومی</option>
                                            <option value="basic" selected>پایه</option>
                                            <option value="prime">اصلی</option>
                                            <option value="professional">تخصصی</option>
                                        @elseif($course->type == 'prime')
                                            <option value="public" selected="selected">عمومی</option>
                                            <option value="basic">پایه</option>
                                            <option value="prime" selected>اصلی</option>
                                            <option value="professional">تخصصی</option>
                                        @elseif($course->type == 'public')
                                            <option value="public" selected>عمومی</option>
                                            <option value="basic">پایه</option>
                                            <option value="prime">اصلی</option>
                                            <option value="professional">تخصصی</option>
                                        @else
                                            <option value="public">عمومی</option>
                                            <option value="basic">پایه</option>
                                            <option value="prime">اصلی</option>
                                            <option value="professional" selected>تخصصی</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row margin-bottom-15">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>نحوه ارائه :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    @if($course->presentation == 'practical')
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="theoretic" name="optionType"> تئوری
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="practical" name="optionType" checked> عملی
                                            </label>
                                        </div>
                                    @else
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
                                    @endif
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
                                                @if(array_search($one_pre_course->name,$course->list_prerequisite) === false)
                                                    <option>{{$one_pre_course->name}}</option>
                                                @else
                                                    <option selected="selected">{{$one_pre_course->name}}</option>
                                                @endif
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
                                    @if($course->status_prerequisite == 'yes')
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="yes" name="optionPre" checked> بلی
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="no" name="optionPre"> خیر
                                            </label>
                                        </div>
                                    @else
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="yes" name="optionPre"> بلی
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="no" name="optionPre" checked> خیر
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>شهریه (تومان):</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input type="number" name="price" class="form-control" value="{{$course->price}}" title="تعداد واحد">
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
                data.id = {{$id}}
                data._token = "{{csrf_token()}}";
                $.ajax({
                    url: "/admin/course/edit/post",
                    type: "POST",
                    data: data,
                    success: function (response) {
                        if (response['status']) {
                            swal("ثبت شد!", response['msg'], "success");
//                            $('button[class="confirm"]').click(function () {
//                                location.reload();
//                            })
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