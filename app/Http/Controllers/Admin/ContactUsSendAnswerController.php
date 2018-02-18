<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsSendAnswerController extends Controller
{
    public function get(){
        return view('admin.contact_us_send_answer',['active'=>'contact_us']);
    }
}
