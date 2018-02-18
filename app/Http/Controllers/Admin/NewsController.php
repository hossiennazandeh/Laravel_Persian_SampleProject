<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\News;
use App\Classes\Search\admin\SearchNews;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\ImageUploading\ImageUploading;
use App\Classes\pagination\pagination;

class NewsController extends Controller
{
    public function get($page_num)
    {
        $limit = 10;
        $obj_pagination = new pagination("news", $page_num, $limit);
        $news = $obj_pagination->paginate('id');
        $counter_news = $page_num * $limit - $limit;
        if ($news['status'] == '350') {
            return view('admin.news_list', ['counter_news' => $counter_news, 'news' => $news['data'], 'page_now' => $page_num, 'all_page' => $news['count'], 'active' => 'news']);
        } elseif ($news['status'] == '300') {
            return view('admin.news_list', ['counter_news' => $counter_news, 'news' => false, 'page_now' => $page_num, 'all_page' => '', 'active' => 'news']);

        } else {
            //error baraye safhe moshke fani
        }
    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->input('status');
            if ($status == 'delete') {
                $data_title = $request->input('title');
                $data_id = $request->input('id');
                $news = new  News();
                $img = $news->select_News_id($data_id);
                $del = $news->delete_News($data_title, $data_id);
                if ($del['status'] == '350') {
                    $del_img = new ImageUploading();
                    $del_img = $del_img->delete_Image($img['news']->img);
                    if ($del_img['status'] == '350') {
                        return response()->json(array('status' => true,
                            'msg' => "خبر مورد نظر با`   موفقیت حذف شد."));
                    } else {
                        return response()->json(array('status' => false,
                            'msg' => "تصویر خبر برای حذف یافت نشد لصفا به واحد فنی اطلاع دهید."));
                    }
                } elseif ($del['status'] == '300') {
                    return response()->json(array('status' => false,
                        'msg' => "سیستم قادر به حذف این خبر نیست لصفا به واحد فنی اطلاع دهید."));
                } else {
                    return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }
            } elseif ($status == 'search') {
                $item = $request->input('item');
                $manage = new SearchNews();
                $search = $manage->search($item);
                if ($search['status'] == '350') {
                    return response()->json(array('status' => true,
                        'data' => $search['search']));
                } else if ($search['status'] == '300') {
                    return response()->json(array('status' => false));
                } else {
                    return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }
            }
        }
    }

}
