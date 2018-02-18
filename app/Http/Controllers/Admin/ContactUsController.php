<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function get(){
        return view('admin.contact_us',['active'=>'contact_us']);
    }
}
