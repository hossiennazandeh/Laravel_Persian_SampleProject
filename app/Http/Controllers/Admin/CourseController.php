<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementCourse;
use App\Classes\pagination\pagination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function get($page_num)
    {
        $limit = 10;
        $obj_pagination = new pagination("course", $page_num, $limit);
        $course = $obj_pagination->paginate('id');
        $counter_course = $page_num * $limit - $limit;
        if ($course['status'] == '350') {
            $data = $course['data'];
            foreach ($data as $one_data) {
                if ($one_data->presentation == 'practical') {
                    $one_data->presentation = 'عملی';
                } else {
                    $one_data->presentation = 'تئوری';
                }
                if ($one_data->type == 'prime') {
                    $one_data->type = 'اصلی';
                } elseif ($one_data->type == 'public') {
                    $one_data->type = 'عمومی';
                } elseif ($one_data->type == 'basic') {
                    $one_data->type = 'پایه';
                } else {
                    $one_data->type = 'تخصصی';
                }
            }
            return view('admin.course', ['counter_course' => $counter_course, 'course' => $data, 'page_now' => $page_num, 'all_page' => $course['count'], 'active' => 'management_course']);
        } elseif ($course['status'] == '300') {
            return view('admin.course', ['counter_course' => $counter_course, 'course' => false, 'page_now' => $page_num, 'all_page' => '', 'active' => 'management_course']);

        } else {
            //error baraye safhe moshke fani
        }
    }
    public function post(Request $request)
    {
        if ($request->ajax()) {
            $id = (int)$request->input('id');
            $manage = new  ManagementCourse();
            $course = $manage->select_course($id);
            if ($course['status'] == '350') {
                $del_course = $manage->delete_course($id,$course['course']->name);
                if ($del_course['status'] == '350') {
                        return response()->json(array('status' => true, 'msg' => "درس مورد نظر با موفقیت حذف شد."));
                } elseif ($del_course['300']) {
                    return response()->json(array('status' => false,
                        'msg' => "سیستم قادر به حذف این درس نیست لصفا به واحد فنی اطلاع دهید."));
                } else {
                    return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }
            } elseif ($course['status'] == '300') {
                return response()->json(array('status' => true,
                    'msg' => "هیچ درسی با این شماره شناسایی برای حذف کردن یافت نشد. لطفا این امر را به کادر فنی گذارش دهید."));
            } else {
                return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
            }

        }

    }
}
