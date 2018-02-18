<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManageChoiceCourse;
use App\Classes\driver\ManagementStudent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentSemesterController extends Controller
{
    public function get($id)
    {
        $manage_student = new ManagementStudent();
        $manage_choice = new ManageChoiceCourse();
        $student = $manage_student->select_student($id);
        if ($student['status'] == '350') {
            $choice = $manage_choice->get_choice($id);
            if ($choice['status'] == '350') {
                return view('admin.student_semester', ['active' => 'management_student', 'counter' => 0,'choice'=> $choice['choice'], 'student' => $student['student']]);
            } elseif ($choice['status'] == '300') {
                return view('admin.student_semester', ['active' => 'management_student', 'counter' => 0, 'choice' => false, 'student' => $student['student']]);
            } else {
                //
            }

        } elseif ($student['status'] == '300') {
            //page auth
        } else {
            //page moshkele fani
        }
    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $id = (int)$request->input('id');
            $manage = new  ManageChoiceCourse();
            $class = $manage->select_choice_course($id);
            if ($class['status'] == '350') {
                $del_class = $manage->delete_choice_course($id);
                if ($del_class['status'] == '350') {
                    return response()->json(array('status' => true, 'msg' => "درس مورد نظر با موفقیت حذف شد."));
                } elseif ($del_class['300']) {
                    return response()->json(array('status' => false,
                        'msg' => "سیستم قادر به حذف این کلاس نیست لصفا به واحد فنی اطلاع دهید."));
                } else {
                    return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }
            } elseif ($class['status'] == '300') {
                return response()->json(array('status' => true,
                    'msg' => "هیچ درسی  با این شماره شناسایی برای حذف کردن یافت نشد. لطفا این امر را به کادر فنی گذارش دهید."));
            } else {
                return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
            }

        }

    }
}
