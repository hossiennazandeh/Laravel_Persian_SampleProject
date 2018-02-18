<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinancialRecordController extends Controller
{
    public function get(){
        return view('admin.financial_record',['active'=>'management_student']);
    }
}
