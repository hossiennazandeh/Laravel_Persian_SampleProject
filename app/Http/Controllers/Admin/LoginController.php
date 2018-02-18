<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementLoginAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class LoginController extends Controller
{
    public function get(){
        return view('admin.login');
    }

    public function post(Request $request){

        if ($request->ajax()) {
            $username = $request->input('username');
            $password = $request->input('password');
            if (empty($username) or empty($password)) {
                return response()->json(array('status' => false, 'msg' => 'لصفا فیلد های مربوطه را پر کنید.'));

            }else{
                $manage = new ManagementLoginAdmin();
                $check_login = $manage->check_admin($username,$password);
                if ($check_login['status'] == '350'){
                    $base_url = request()->session()->get('admin_url');
                    $base_url = str_replace('http://localhost:8000','',$base_url);
                    if ($base_url == '/admin/login'){
                        $base_url = '/admin/home';
                    }elseif ($base_url == '/admin/login/post' or $base_url == null){
                        $base_url = '/admin/home';
                    }
                    return response()->json(array('status' => true, 'url' =>$base_url));
                }else if ($check_login['status'] == '300'){
                    return response()->json(array('status' => false, 'msg' =>$check_login['msg']));
                }else{
                    return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }

            }
        }
    }

}
