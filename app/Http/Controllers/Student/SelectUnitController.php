<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SelectUnitController extends Controller
{
    public function get(){
        return view('student.select_unit',['active'=>'select_unit']);
    }
}
