<?php

namespace App\Http\Controllers\Admin;

use App\Classes\ImageUploading\ImageUploading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\driver\News;
use Illuminate\Support\Facades\Crypt;

class NewsEditController extends Controller
{
    public function get($title)
    {
        $news = new News($title);
        $news = $news->select_News();
        if ($news['status'] == '350'){
            $data = $news['news'];
            return view('admin.news_edit', ['active' => 'news', 'data' => $data]);

        }elseif ($news['status'] == '300'){
            //return page 404
        }else{
            // page moshkele fani
        }
    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $data_title = $request->input('title');
            $data_abstract = $request->input('abstract');
            $data_body = $request->input('body');
            $data_file = $request->file('file');
            $data_id = $request->input('id');
            if (empty($data_title) or empty($data_abstract) or empty($data_body)) {
                return response()->json(array('status' => false, 'msg' => 'لصفا فیلد های مربوطه را پر کنید.'));
            } else {
                $news = new News($data_title, $data_abstract, $data_body);
                $status = $news->check_update_News($data_id);
                if ($status['status'] == '350') {
                    if (empty($data_file)) {
                        $news = $news->update_News($data_id,$img=null);
                        if ($news['status'] == '350'){
                            return response()->json(array('status'=>true,
                                'msg'=>"خبر مورد نظر با موفقیت ویرایش شد."));
                        }
                        else{
                            return response()->json(array('status'=>false,'msg'=>'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                        }
                    } else {
                        $old_news = $news->select_News_id($data_id);
                        $img = new ImageUploading($data_file, 'media/news', true);
                        $img = $img->Edit_Image($old_news['news']->img);
                        if($img['status'] == true){
                            $news = $news->update_News($data_id,$img['name_file']);
                            if ($news['status'] == '350'){
                                return response()->json(array('status'=>true,
                                    'msg'=>"خبر مورد نظر با موفقیت ویرایش شد."));
                            }
                            else{
                                return response()->json(array('status'=>false,'msg'=>'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                            }
                        }else{
                            return response()->json(array('status'=>false,'msg'=>'فرمت تصویر خبر با فرمت قراردادی سازگار نیست.'));
                        }

                    }

                }
                elseif ($status['status'] == '300'){
                    return response()->json(array('status' => false, 'msg' => 'بعضی از فیلد های وارد شده با خبری دیگر همسان است لطفا آن ها را تغییر دهید.'));
                }else{
                    return response()->json(array('status'=>false,'msg'=>'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }
            }
        }
    }

}
