<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\ImageUploading\ImageUploading;
use App\Classes\driver\News;

class NewsNewController extends Controller
{
    public function get()
    {
        return view('admin.news_new',['active'=>'news']);
    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $data_title = $request->input('title');
            $data_abstract = $request->input('abstract');
            $data_body = $request->input('body');
            $data_file = $request->file('file');
            if (empty($data_title) or empty($data_abstract) or empty($data_body)) {
                return response()->json(array('status'=>false,'msg'=>'لصفا فیلد های مربوطه را پر کنید.'));

            } else {
                $news = new News($data_title, $data_abstract, $data_body);
                $status = $news->check_News();
                if ($status['status'] == '350') {
                    if (empty($data_file)) {
                        $img = null;
                        $news = $news->insert_News($img);
                        if ($news['status'] == '350'){
                            return response()->json(array('status'=>true,
                                'msg'=>"خبر مورد نظر با عنوان «".$news['name_news']."» ودر تاريخ «".$news['publish_date']."» ثبت گرديد."));
                        }
                        else{
                            return response()->json(array('status'=>false,'msg'=>'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید'));
                        }
                    } else {
                        $img = new ImageUploading($data_file, 'media/news', true);
                        $img = $img->setImage();
                        if($img['status'] == true){
                            $news = $news->insert_News($img['name_file']);
                            if ($news['status'] == '350'){
                                return response()->json(array('status'=>true,
                                    'msg'=>"خبر مورد نظر با عنوان «".$news['name_news']."» ودر تاريخ «".$news['publish_date']."» ثبت گرديد."));
                            }
                            else{
                                return response()->json(array('status'=>false,'msg'=>'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید'));
                            }
                        }else{
                            return response()->json(array('status'=>false,'msg'=>'فرمت تصویر خبر با فرمت قراردادی سازگار نیست.'));
                        }

                    }

                } elseif ($status['status'] == '300') {
                    return response()->json(array('status'=>false,'msg'=>'این خبر قبلا ثبت شده است.'));
                } else {
                    return response()->json(array('status'=>false,'msg'=>'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }


            }

        }

    }
}
