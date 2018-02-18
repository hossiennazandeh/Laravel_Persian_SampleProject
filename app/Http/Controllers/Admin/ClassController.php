<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementClasses;
use App\Classes\pagination\pagination;
use App\Classes\Search\admin\SearchClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{

    public function get($page_num)
    {
        $limit = 10;
        $obj_pagination = new pagination("class", $page_num, $limit);
        $class = $obj_pagination->paginate('id');
        $counter_class = $page_num * $limit - $limit;
        if ($class['status'] == '350') {
            $data = $class['data'];
            return view('admin.class', ['counter_class' => $counter_class, 'class' => $data, 'page_now' => $page_num, 'all_page' => $class['count'], 'active' => 'management_class']);
        } elseif ($class['status'] == '300') {
            return view('admin.class', ['counter_class' => $counter_class, 'class' => false, 'page_now' => $page_num, 'all_page' => '', 'active' => 'management_class']);

        } else {
            //error baraye safhe moshke fani
        }
    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->input('status');
            if ($status == 'delete') {
                $id = (int)$request->input('id');
                $manage = new  ManagementClasses();
                $class = $manage->select_class($id);
                if ($class['status'] == '350') {
                    $del_class = $manage->delete_class($id);
                    if ($del_class['status'] == '350') {
                        return response()->json(array('status' => true, 'msg' => "کلاس مورد نظر با موفقیت حذف شد."));
                    } elseif ($del_class['300']) {
                        return response()->json(array('status' => false,
                            'msg' => "سیستم قادر به حذف این کلاس نیست لصفا به واحد فنی اطلاع دهید."));
                    } else {
                        return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                    }
                } elseif ($class['status'] == '300') {
                    return response()->json(array('status' => true,
                        'msg' => "هیچ کلاسی با این شماره شناسایی برای حذف کردن یافت نشد. لطفا این امر را به کادر فنی گذارش دهید."));
                } else {
                    return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }

            } elseif ($status == 'search') {
                $item = $request->input('item');
                $manage = new SearchClass();
                $search = $manage->search($item);
                if ($search['status'] == '350'){
                    return response()->json(array('status' => true,
                        'data' => $search['search']));
                }else if ($search['status'] == '300'){
                    return response()->json(array('status' => false));
                }else{
                    return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }
            }
        }

    }
}
