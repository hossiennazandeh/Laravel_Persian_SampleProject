<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementClasses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassEditController extends Controller
{

    public function get($id)
    {
        $class = new ManagementClasses();
        $class = $class->select_class($id);
        $data = $class['class'];
        if ($class['status'] == '350') {
            return view('admin.class_edit', ['active' => 'management_class', 'class' => $data, 'id' => $id]);

        } elseif ($class['status'] == '300') {
            //return page 404
        } else {
            // page moshkele fani
        }
    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $number_class = $request->input('number_class');
            $name_class = $request->input('name_class');
            $id_class = $request->input('id');
            if (empty($name_class) or empty($number_class)) {
                return response()->json(array('status' => false, 'msg' => 'لصفا فیلد های مربوطه را پر کنید.'));

            } else {
                if (is_numeric($number_class)) {
                    $manage = new ManagementClasses($name_class,$number_class);
                    $status = $manage->check_class((int)$id_class,true);
                    if ($status['status'] == '350') {
                        $new_class = $manage->update_class((int)$id_class);
                        if ($new_class['status'] == '350') {
                            return response()->json(array('status' => true,
                                'msg'=>"کلاس مورد نظر با موفقیت ویرایش شد."));
                        } else {
                            return response()->json(array('status' => false, 'msg' => $new_class['message']));
                        }
                    } elseif ($status['status'] == '300') {
                        return response()->json(array('status' => false, 'msg' => 'این کلاس قبلا ثبت شده است.'));
                    } else {
                        return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                    }

                } else {
                    return response()->json(array('status' => false, 'msg' => 'لطفا فیلد شماره کلاس را فقط به صورت عددی وارد کنید.'));
                }

            }

        }
    }
}
