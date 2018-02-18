<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementCourse;
use App\Classes\driver\ManagementCourseAvailable;
use App\Classes\driver\ManagementProfessor;
use App\Classes\pagination\pagination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseAvailableController extends Controller
{
    public function get($page_num)
    {
        $limit = 10;
        $obj_pagination = new pagination("group_course", $page_num, $limit);
        $course_available = $obj_pagination->paginate('code_course');
        $counter_course = $page_num * $limit - $limit;
        if ($course_available['status'] == '350') {
            $data = $course_available['data'];
            $manage_course = new ManagementCourse();
            $manage_professor = new ManagementProfessor();
            foreach ($data as $one_course) {
                $name_course = $manage_course->select_course_custom($one_course->Course_id, 'name', 'unit_number');
                $name_professor = $manage_professor->select_professor_name($one_course->professor_id);
                if ($name_course['status'] == '350' and $name_professor['status'] == '350') {
                    $one_course->name_course = $name_course['result']->name;
                    $one_course->name_professor = $name_professor['name'];
                    $one_course->unit_number = $name_course['result']->unit_number;

                } else {
                    //page fani
                }
            }
            return view('admin.course_available', ['counter_course' => $counter_course, 'course_available' => $data, 'page_now' => $page_num, 'all_page' => $course_available['count'], 'active' => 'management_course']);
        } elseif ($course_available['status'] == "300") {
            return view('admin.course_available', ['counter_course' => $counter_course, 'course_available' => false, 'page_now' => $page_num, 'all_page' => '', 'active' => 'management_course']);
        } else {
            //error baraye safhe moshke fani
        }

    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $id = (int)$request->input('id');
            $manage = new  ManagementCourseAvailable();
            $course = $manage->check_course($id);
            if ($course['status'] == '350') {
                $del_course = $manage->delete_course($id);
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
