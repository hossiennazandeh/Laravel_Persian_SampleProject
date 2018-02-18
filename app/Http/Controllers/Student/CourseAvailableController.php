<?php

namespace App\Http\Controllers\Student;

use App\Classes\driver\ManagementCourseAvailable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseAvailableController extends Controller
{
    public function get()
    {
        $manage = new ManagementCourseAvailable();
        $course_avl = $manage->get_all_course_available();
        if ($course_avl['status'] == '350') {
            return view('student.course_available', ['active' => 'course_available', 'course' => $course_avl['list_course'], 'count' => 0]);
        } else if ($course_avl['status'] == '300') {
            return view('student.course_available', ['active' => 'course_available', 'course' => false]);
        } else {
            //moshkele fani
        }

    }
}
