<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseNewController extends Controller
{
    public function get()
    {

        $manage = new ManagementCourse();
        $pre_course = $manage->get_prerequisite_course();
        if ($pre_course['status'] == '350') {
            return view('admin.course_new', ['active' => 'management_course','pre_course'=>$pre_course['data']]);
        } elseif ($pre_course['status'] == '300') {
            return view('admin.course_new', ['active' => 'management_course','pre_course'=>false]);

        } else {
            //error baraye safhe moshke fani
        }

    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if (empty($data['name']) or empty($data['unit_number']) or empty($data['price'])) {
                return response()->json(array('status' => false, 'msg' => 'لصفا فیلد های مربوطه را پر کنید.'));

            } else {
                if (is_numeric($data['price']) and is_numeric($data['unit_number'])) {
                    if (1 <= $data['unit_number'] and $data['unit_number'] <= 6) {
                        $manage = new ManagementCourse($data);
                        $status = $manage->check_course();
                        if ($status['status'] == '350') {
                            $new_course = $manage->insert_course();
                            if ($new_course['status'] == '350') {
                                return response()->json(array('status' => true,
                                    'msg' => "درس با نام «" . $new_course['name_course'] . "» ثبت گرديد."));
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
