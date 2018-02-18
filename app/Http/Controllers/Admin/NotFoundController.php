<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotFoundController extends Controller
{
    public function get(){
        return view('admin.not_found');
    }
}
