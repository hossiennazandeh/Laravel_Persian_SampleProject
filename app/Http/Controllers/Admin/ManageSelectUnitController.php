<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageSelectUnitController extends Controller
{
    public function get()
    {
        return view('admin.manage_select_unit', ['active' => 'management_class']);
    }
}
