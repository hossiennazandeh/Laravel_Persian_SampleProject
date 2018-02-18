@extends("admin.base.base")
@section('title')
    افزودن خبر
@endsection
@section('css')
    <script src="{{ asset('dist/plugin/ckeditor/ckeditor.js') }}"></script>
@endsection
@section('header')
افزودن خبر
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/admin/news/list/1">
                        <input type="button" class="btn btn-primary pull-right" value="بازگشت">
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">افزودن خبر</h4>
                    <p class="category">برای افزودن خبر، فرم زیر را پر نمایید.</p>
                </div>
                <div class="card-content">
                    <form name="news" class="" enctype='#'>
                        <div class="col-md-10 col-md-offset-1 col-xs-12">
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>عنوان خبر :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <input maxlength="25" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>چکیده خبر :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <textarea maxlength="255" name="abstract" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">

                                    <label for="description">متن خبر :</label>
                                </div>
                                <div class="col-xs-12 col-md-10 pull-right">
                                    <textarea name="body" id="body" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="colxs-12 col-md-2 pull-right">
                                    <label>تصویر خبر :</label>
                                </div>
                                <div class="col-xs-12 col-md-6 pull-right">
                                    <input name="image_input" class="form-control display-none" type="file" accept="image/x-png, image/jpg, image/jpeg">
                                    <div id="photo" class="portfolio-item" style='background-image: url("{{asset('img/default-news.jpg')}}");'>
                                        <div class="details">
                                            <h4>تعویض تصویر</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row margin-top-15">
                                <input name="save_news" type="button" class="btn btn-primary pull-left submit_button" value="ثبت">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="_alert_">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                class="fa fa-times-circle"></i></button>
                    <h4 class="modal-title">پیغام</h4>
                </div>
                <div class="modal-body alert_modal_class">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <input name="" type="button" class="btn btn-danger" data-dismiss="modal" value="بستن">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            CKEDITOR.replace('body', {
                language: 'fa', uiColor: '#972FB0', filebrowserBrowseUrl: '/browser/browse.php',
                toolbar: [
                    {
                        name: 'clipboard',
                        groups: ['clipboard', 'undo'],
                        items: ['Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo']
                    },
                    {name: 'insert', items: ['Image', 'Table', 'Smiley']},
                    {name: 'links', items: ['Link', 'Unlink', 'Anchor']},
                    {
                        name: 'basicstyles',
                        groups: ['basicstyles', 'cleanup'],
                        items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']
                    },
                    {
                        name: 'paragraph',
                        groups: ['list', 'indent', 'blocks', 'align'],
                        items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'Justify', 'AlignRight', 'Center', 'AlignLeft']
                    },
                    {name: 'styles', items: ['FontName', 'Format']},
                    {name: 'tools', items: ['Maximize']}
                ]

            });
            $('#photo').click(function () {
                $("input[name='image_input']").click()
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#photo').css("background-image", "url(' " + e.target.result + " ')");
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("input[name='image_input']").change(function () {
                var size = this.files[0].size;
                if (size <= 2000000){
                    readURL(this);
                }else {
                    swal("خطا", "حجم تصویر بیشتر از حجم مجاز است." + "حد اکثر حجم مجاز : 2 مگابایت", "error");
                }
            });

            $("input[name='save_news']").click(function (e) {
                e.preventDefault();
                var file = $("input[name='image_input']")[0].files[0];
                var frm = new FormData();
                frm.append("file", file);
                frm.append("title", $("input[name='title']").val());
                frm.append("abstract", $("textarea[name='abstract']").val());
                frm.append("body", CKEDITOR.instances.body.getData());
                frm.append("_token", '{{csrf_token()}}');


                $.ajax({
                    url: "/admin/news/new/post",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: frm,
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