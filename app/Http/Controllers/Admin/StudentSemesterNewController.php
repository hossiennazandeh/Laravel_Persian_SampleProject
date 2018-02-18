<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManageChoiceCourse;
use App\Classes\driver\ManagementCourseAvailable;
use App\Classes\driver\ManagementStudent;
use App\Classes\driver\ManageSemester;
use App\Classes\ValidationForm\CustomValidation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentSemesterNewController extends Controller
{
    public function get($id)
    {
        $manage_student = new ManagementStudent();
        $manage_course_avl = new ManagementCourseAvailable();
        $manage_semester = new ManageSemester();
        $student = $manage_student->select_student($id);
        if ($student['status'] == '350') {
            $course_avl = $manage_course_avl->get_all_group_course();
            $all_semester = $manage_semester->get_semester_now(true);
            if ($course_avl['status'] == '350') {
                return view('admin.student_semester_new', ['active' => 'management_student', 'student' => $student['student'],
                    'all_course' => $course_avl['list_course'], 'list_term' =>$all_semester, 'counter' => 0]);
            } elseif ($course_avl['status'] == '300') {
                return view('admin.student_semester_new', ['active' => 'management_student', 'student' => $student['student'],
                    'all_course' => false,'list_term' =>$all_semester, 'counter' => 0]);
            } else if ($course_avl['status'] == '400' or $all_semester['status'] == '400') {
                //page moshkele fani
            }

        } else if ($student['status'] == '300') {
            //page auth
        } else {
            //page moskele fani
        }

    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $list_code = json_decode($data['list_code']);
            if (empty($data['semester'])) {
                return response()->json(array('status' => false, 'msg' => 'لصفا فیلد ترم را پر کنید'));
            } elseif ($list_code == []) {
                return response()->json(array('status' => false, 'msg' => 'هیچ درسی انتخاب نکردید لطفا درسی انتخاب کنید.'));
            } else {
                if (count(array_unique($list_code)) < count($list_code)) {
                    return response()->json(array('status' => false, 'msg' => 'نمی توان یک درس را با چند گروه درسی انتخاب کرد.'));
                } else {
                    $val_semester = new CustomValidation();
                    $val_semester = $val_semester->is_semester($data['semester']);
                    if ($val_semester['status']) {
                        $manage = new ManageChoiceCourse();
                        $insert_choice = $manage->insert_choice_course($data['id_student'], $list_code, $data['semester'],$data['status_price']);
                        if ($insert_choice['status'] == '350') {
                            return response()->json(array('status' => true, 'msg' => 'عملیات با موفقیت انجام شد.'));
                        } else if ($insert_choice['status'] == '300') {
                            return response()->json(array('status' => false, 'msg' => 'درس با کد  ' . $insert_choice['course_id'] . 'قبلا برای این دانشجو برداشته شده است.'));
                        } else {
                            return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                        }
                    } else {
                        return response()->json(array('status' => false, 'msg' => $val_semester['message']));
                    }

                }
            }

        }
    }
}
