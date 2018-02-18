<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $status = $request->input('status');
        if ($status == 'logout') {
            $request->session()->forget('login_admin');
            return response()->json(array('status' => true));
        }
    }
}
