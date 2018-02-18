@extends("student.base.base")
@section('title')
 تنظیمات
@endsection
@section('navbar-title')
  تنظیمات
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    رنگ های اصلی
                </div>
                <div class="card-body">
                    <div class="radio">
                        <input name="theming" id="radio3" value="default" checked="" type="radio">
                        <label for="radio3">
                            پیش فرض (سبز)
                        </label>
                    </div>
                    <div class="radio">
                        <input name="theming" id="radio4" value="blue-sky" type="radio">
                        <label for="radio4">
                            آبی آسمانی
                        </label>
                    </div>
                    <div class="radio">
                        <input name="theming" id="radio5" value="yellow" type="radio">
                        <label for="radio5">
                            زرد
                        </label>
                    </div>
                    <div class="radio">
                        <input name="theming" id="radio6" value="red" type="radio">
                        <label for="radio6">
                            قرمز
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection