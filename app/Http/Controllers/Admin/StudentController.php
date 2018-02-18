<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementStudent;
use App\Classes\ImageUploading\ImageUploading;
use App\Classes\pagination\pagination;
use App\Classes\Search\admin\SearchStudent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function get($condition, $page_num)
    {
        $student = '';
        $limit = 10;
        $name_condition = 'status';
        $obj_pagination = new pagination("student", $page_num, $limit);
        $counter_student = $page_num * $limit - $limit;
        if ($condition == 'all') {
            $student = $obj_pagination->paginate('student_number');

        } elseif ($condition == 'active' or $condition == 'non_active' or $condition == 'expulsion') {
            $student = $obj_pagination->paginate('student_number', $name_condition, $condition);
        } else {
//            go to 404
        }
        if ($student['status'] == '350') {

            return view('admin.student', ['counter_student' => $counter_student, 'student' => $student['data'], 'page_now' => $page_num, 'all_page' => $student['count'], 'condition' => $condition, 'active' => 'management_student']);
        } elseif ($student['status'] == '300') {
            return view('admin.student', ['counter_student' => $counter_student, 'student' => false, 'page_now' => $page_num, 'all_page' => '', 'condition' => $condition, 'active' => 'management_student']);

        } else {
            // page fani
        }
    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->input('status');
            if ($status == 'delete') {
                $student_number = $request->input('student_number');
                $student_number = (int)$student_number;
                $manage = new  ManagementStudent();
                $student = $manage->select_student($student_number);
                if ($student['status'] == '350') {
                    $img = $student['student']->img;
                    $del_student = $manage->delete_student($student_number);
                    if ($del_student['status'] == '350') {
                        $del_img = new ImageUploading();
                        $del_img = $del_img->delete_Image($img);
                        if ($del_img['status'] == '350') {
                            return response()->json(array('status' => true,
                                'msg' => "دانشجوی مورد نظر با موفقیت حذف شد."));
                        } else {
                            return response()->json(array('status' => false,
                                'msg' => "تصویر دانشجو برای حذف یافت نشد لصفا به واحد فنی اطلاع دهید."));
                        }
                    } elseif ($del_student['300']) {
                        return response()->json(array('status' => false,
                            'msg' => "سیستم قادر به حذف این دانشجو نیست لصفا به واحد فنی اطلاع دهید."));
                    } else {
                        return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                    }

                } elseif ($student['status'] == '300') {
                    return response()->json(array('status' => true,
                        'msg' => "هیچ دانشجویی با این شماره دانشجویی برای حذف کردن یافت نشد. لطفا این موضوع را به کادر فنی گذارش دهید."));
                } else {
                    return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }

            } else if ($status == 'search') {
                $item = $request->input('item');
                $manage = new SearchStudent();
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
