<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseEditController extends Controller
{
    public function get($id)
    {
        $course = new ManagementCourse();
        $pre_course = $course->get_prerequisite_course();
        $course = $course->select_course($id);
        $data = $course['course'];
        $data->list_prerequisite = explode(',', $data->list_prerequisite);
        if ($course['status'] == '350' and $pre_course['status'] == '350') {
            return view('admin.course_edit', ['active' => 'management_course', 'course' => $data, 'pre_course' => $pre_course['data'], 'id' => $id]);

        } elseif ($course['status'] == '300') {
            //return page 404
        } elseif ($pre_course['status'] == '300') {
            return view('admin.course_edit', ['active' => 'management_course', 'course' => $data, 'pre_course' => false, 'id' => $id]);
        } else {
            // page moshkele fani
        }
    }
    public function post(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            if (empty($data['name']) or empty($data['unit_number']) or empty($data['price'])) {
                return response()->json(array('status' => false, 'msg' => 'لصفا فیلد های مربوطه را پر کنید.'));

            } else {
                if (is_numeric($data['price']) and is_numeric($data['unit_number'])) {
                    if (1 <= $data['unit_number'] and $data['unit_number'] <= 6) {
                        $manage = new ManagementCourse($data);
                        $manage->delete_prerequisite_course('برنام نویسی');
                        $status = $manage->check_course($data['id'],true);
                        if ($status['status'] == '350') {
                            $new_course = $manage->update_course($data['id']);
                            if ($new_course['status'] == '350') {
                                return response()->json(array('status' => true,
                                    'msg' => "درس با نام «" . $new_course['name_course'] . "» با موفقیت ویرایش شد."));
                            } else {
                                return response()->json(array('status' => false, 'msg' => $new_course['message']));
                            }
                        } elseif ($status['status'] == '300') {
                            return response()->json(array('status' => false, 'msg' => 'این درس قبلا ثبت شده است.'));
                        } else {
                            return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                        }
                    } else {
                        return response()->json(array('status' => false, 'msg' => 'تعداد واحد درس باید بین 1 تا 6 واحد باشد'));
                    }
                } else {
                    return response()->json(array('status' => false, 'msg' => 'لطفا فیلد های شهریه و تعداد واحد را فقط به صورت عددی وارد کنید.'));
                }

            }

        }
    }
}
