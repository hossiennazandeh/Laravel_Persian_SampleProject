<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementCourse;
use App\Classes\driver\ManagementCourseAvailable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseAvailableEditController extends Controller
{
    public function get($id)
    {
        $manage = new  ManagementCourseAvailable();
        $list_semester = $manage->get_all_semester();
        $list_course = $manage->get_all_course();
        $list_professor = $manage->get_all_professor();
        $list_class = $manage->get_all_class();
        $list_course_av = $manage->select_available_course($id);
        if ($list_class['status'] == '400' or $list_semester['status'] == '400'
            or $list_course['status'] == '400' or $list_professor['status'] == '400' or $list_course_av['status'] == '400'
        ) {
            //moshkele fani
        } elseif ($list_course_av['status'] == '300') {

        } else {
            $manage_course = new ManagementCourse();
            $exam_course = $manage_course->select_course_custom($list_course_av['course']->Course_id, 'date_exam');
            $time_course = $manage->select_time_course($list_course_av['course']->Time_Course_id);
            if ($time_course['status'] == '300' or $time_course['status'] == '400' or $exam_course['status'] == '400'
                or $exam_course['status'] == '300'
            ) {
                //moshkele fani
            } else {
                $guest_semester = $list_course_av['course']->guest_semester;
                $guest_semester= json_decode($guest_semester);
                unset($list_course_av['course']->guest_semester);
                return view('admin.course_available_edit', ['active' => 'management_course',
                    'list_semester' => $list_semester, 'list_course' => $list_course,
                    'list_professor' => $list_professor, 'list_class' => $list_class,
                    'exam_course'=> $exam_course['result']->date_exam,'days'=>$time_course['days'],
                    'classes'=>$time_course['classes'],'time'=>$time_course['time'],
                    'rotatory'=>$time_course['rotatory'],'prim_course'=>$list_course_av['course'],'guest_semester'=>$guest_semester]);
            }

        }
    }
}
