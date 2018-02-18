<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentSemesterEditController extends Controller
{
    public function get(){
        return view('admin.student_semester_edit',['active'=>'management_student']);
    }
}
