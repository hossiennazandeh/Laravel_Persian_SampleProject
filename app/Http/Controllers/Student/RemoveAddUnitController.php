<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RemoveAddUnitController extends Controller
{
    public function get(){
        return view('student.remove_add_unit',['active'=>'remove_add_unit']);
    }
}
