<?php

namespace App\Http\Controllers\admin;

use App\Classes\driver\ManagementCourse;
use App\Classes\driver\ManagementProfessor;
use App\Classes\driver\ManagementStudent;
use App\Classes\driver\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function get()
    {
        $manage_student = new ManagementStudent();
        $manage_news = new News();
        $manage_professor = new ManagementProfessor();
        $manage_course = new ManagementCourse();
        $count_student = $manage_student->count_student();
        $count_news = $manage_news->count_news();
        $count_professor = $manage_professor->count_professor();
        $count_course = $manage_course->count_course();
        if ($count_course['status'] == '350' and $count_news['status'] == '350'
            and $count_professor['status'] == '350' and $count_student['status'] == '350'
        ) {
            return view('admin.index', ['active' => 'home', 'count_news' => $count_news['count_news'],
                'count_professor' =>$count_professor['count_professor'],'count_student'=>$count_student['count_student'],
            'count_course'=>$count_course['count_course']]);
        } else {
            //page moshkele fani
        }
    }
}
