<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementCourseAvailable;
use App\Classes\driver\ManageSemester;
use App\Classes\ValidationForm\CustomValidation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseAvailableNewController extends Controller
{
    public function get()
    {
        $manage = new  ManagementCourseAvailable();
        $manage_semester = new ManageSemester();
        $semester_now = $manage_semester->get_semester_now();
        $list_semester = $manage->get_all_semester();
        $list_course = $manage->get_all_course();
        $list_professor = $manage->get_all_professor();
        $list_class = $manage->get_all_class();
        if ($list_class['status'] == '400' or $list_semester['status'] == '400'
            or $list_course['status'] == '400' or $list_professor['status'] == '400' or $semester_now['status'] == '400'
        ) {
            //moshkele fani
        } else {

            if ($semester_now['status'] == '300'){
                $term = false;
            }else{
                $term = $semester_now['term_now'];
            }
            return view('admin.course_available_new', ['active' => 'management_course',
                'list_semester' => $list_semester, 'list_course' => $list_course,
                'list_professor' => $list_professor, 'list_class' => $list_class,'term_now'=>$term]);
        }
    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $manage = new ManagementCourseAvailable($data);
            if ($data['status'] == 'check') {
                $time_class = $manage->check_date_class((int)$data['date'], (int)$data['name_class']);
                if ($time_class['status'] == '350') {
                    return response()->json(array('status' => true, 'list_time' => $time_class['list_time']));
                }

            } elseif ($data['status'] == 'new') {
                if ($data['semester'] == '' or $data['group'] == '' or $data['id_professor'] == '' or $data['id_course'] == ''
                    or $data['capacity'] == '' or $data['min_capacity'] == '' or json_decode($data['list_day']) == array() or json_decode($data['list_classes']) == []
                    or json_decode($data['list_time']) == []
                ) {
                    return response()->json(array('status' => false, 'msg' => 'لطفا تمام فیلد ها را پر کنید'));
                } else {
                    if (is_numeric($data['capacity']) and is_numeric($data['min_capacity'])) {
                        if ((int)$data['min_capacity'] <= (int)$data['capacity']) {
                            if ($data['date_exam'] == '') {
                                $date_exam = null;
                            } else {
                                $check_date = new CustomValidation();
                                $check_date = $check_date->is_date_exam($data['date_exam']);
                                if ($check_date['status']) {
                                    $date_exam = $data['date_exam'];
                                } else {
                                    return response()->json(array('status' => false, 'msg' => $check_date['message']));
                                }
                            }
                            $insert_gc = $manage->insert_course_group();
                            if ($insert_gc['status'] == '350'){
                                return response()->json(array('status' => true, 'msg' => "درس با گروه درسی مورد نظر با موفقیت ثبت گردید."));
                            }elseif ($insert_gc['status'] == '300'){
                                return response()->json(array('status' => false, 'msg' => $insert_gc['msg']));
                            }else{
                                return response()->json(array('status' => false, 'msg' => $insert_gc['msg']));
                            }
                        } else {
                            return response()->json(array('status' => false, 'msg' => 'مقدار فیلد حداقل ظرفیت باید کم تر از فیلد ظرفیت باشد '));
                        }
                    } else {
                        return response()->json(array('status' => false, 'msg' => 'فیلد های ظرفیت و حداقل ظرفیت باید به صورت عددی باشد.'));
                    }
                }

            } elseif ($data['status'] == 'exam_course') {
                $date_exam = $manage->fallBack_exam($data['id_course']);
                if ($date_exam['status'] == '350') {
                    return response()->json(array('status' => true, 'date_exam' => $date_exam['date_exam'],'time_exam'=>$date_exam['time_exam']));
                } elseif ($date_exam['status'] == '300') {
                    return response()->json(array('status' => true, 'date_exam' => false));
                } else {
                    return response()->json(array('status' => false,
                        'msg' => "سیستم در باز گردانی زمان امتحان درس دچار مشکل شده است لطفا سریعا واحد اطلاعات را در جریان قرار دهید."));
                }
            }
        }
    }
}
