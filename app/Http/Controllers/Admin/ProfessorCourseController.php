<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementCourseAvailable;
use App\Classes\driver\ManagementProfessor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessorCourseController extends Controller
{
    public function get($id_professor){
        $manage_professor = new ManagementProfessor();
        $manage_course = new ManagementCourseAvailable();
        $professor = $manage_professor->select_professor((int)$id_professor);
        if ($professor['status'] == '350') {
            $course = $manage_course->get_course_available_by_professor($id_professor);
            if ($course['status'] == '350') {
                return view('admin.professor_course', ['active' => 'management_professor', 'counter' => 0,'professor'=> $professor['professor'], 'list_course' => $course['list_course']]);
            } elseif ($course['status'] == '300') {
                return view('admin.professor_course', ['active' => 'management_professor', 'counter' => 0, 'list_course' => false, 'professor' => $professor['professor']]);
            } else {
                //
            }

        } elseif ($professor['status'] == '300') {
            //page auth
        } else {
            //page moshkele fani
        }
    }
}
