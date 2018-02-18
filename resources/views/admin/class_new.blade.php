@extends("admin.base.base")
@section('title')
    افزودن کلاس
@endsection
@section('css')

@endsection
@section('header')
    افزودن کلاس
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{\Illuminate\Support\Facades\URL::to("/admin/class/list/1")}}">
                        <input type="button" class="btn btn-primary pull-right" value="بازگشت">
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">افزودن کلاس</h4>
                    <p class="category">برای افزودن کلاس، فرم زیر را پر نمایید.</p>
                </div>
                <div class="card-content">
                    <form name="news" class="" enctype='#'>
                        <div class="col-md-10 col-md-offset-1 col-xs-12">
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>نام کلاس :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input name="name_class" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>شماره کلاس :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input type="number" name="number_class" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <input name="save_class" type="button" class="btn btn-primary pull-left submit_button"
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
            $('input[name="save_class"]').click(function () {
                var data = {};
                data.name_class = $('input[name="name_class"]').val();
                data.number_class = $('input[name="number_class"]').val();
                data._token = "{{csrf_token()}}";
                $.ajax({
                    url: "/admin/semester/new/post",
                    type: "POST",
                    data: data,
                    success: function (response) {
                        if (response['status']) {
                            swal("ثبت شد!", response['msg'], "success");
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