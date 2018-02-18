<?php

namespace App\Http\Controllers\Admin;

use app\Classes\driver\ManagementCourseAvailable;
use App\Classes\driver\ManagementStudent;
use App\Classes\driver\ManageSemester;
use App\Classes\ImageUploading\ImageUploading;
use App\Classes\ValidationForm\ValidationForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentNewController extends Controller
{
    public function get()
    {
        $manage_semester = new  ManageSemester();
        $all_semester = $manage_semester->get_semester_now(true);
        if ($all_semester['status'] == '400') {
            //moshkele fani
        } elseif ($all_semester['status'] == '350') {
            return view('admin.student_new', ['active' => 'management_student', 'list_term' => $all_semester]);
        }else{
            return view('admin.student_new', ['active' => 'management_student', 'list_term' => false]);
        }
    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $data_file = $request->file('file');
            if (empty($data['first_name']) or empty($data['last_name'])
                or empty($data['father_name']) or empty($data['birth_day'])
                or empty($data['birth_place']) or empty($data['national_code'])
                or empty($data['id']) or empty($data['address'])
            ) {
                return response()->json(array('status' => false, 'msg' => 'لصفا فیلد های مربوطه را پر کنید.'));
            } else {
                if (empty($data['mobile']) or empty($data['phone'])){
                    if(empty($data['mobile']) and empty($data['phone'])){
                        $list_status = array('national_code' => true, 'birth_day' => true,
                            'phone' => false, 'mobile' => false, 'id' => true, 'email' => false,'entry_semester'=> true,'password'=>false);
                    }elseif (empty($data['mobile'])){
                        $list_status = array('national_code' => true, 'birth_day' => true,
                            'phone' => true, 'mobile' => false, 'id' => true, 'email' => false,'entry_semester'=> true,'password'=>false);
                    }else{
                        $list_status = array('national_code' => true, 'birth_day' => true,
                            'phone' => false, 'mobile' => true, 'id' => true, 'email' => false,'entry_semester'=> true,'password'=>false);
                    }
                }else{
                    $list_status = array('national_code' => true, 'birth_day' => true,
                        'phone' => true, 'mobile' => true, 'id' => true, 'email' => false,'entry_semester'=> true,'password'=>false);
                }
                $form = new ValidationForm($data, $list_status);
                $val_form = $form->init();
                if ($val_form['status']) {
                    $manage = new ManagementStudent($data);
                    $status = $manage->check_student();
                    if ($status['status'] == '350') {
                        if (empty($data_file)) {
                            $img = null;
                        }else{
                            $img = new ImageUploading($data_file, 'media/student', true);
                            $img = $img->setImage();
                            if ($img['status'] == true){
                                $img = $img['name_file'];
                            }else{
                                return response()->json(array('status'=>false,'msg'=>'فرمت تصویر دانشجو با فرمت قراردادی سازگار نیست.'));
                            }
                        }
                        $new_student = $manage->insert_student($img);
                        if ($new_student['status'] == '350'){
                            return response()->json(array('status'=>true,
                                'msg'=>"دانشجو با نام «".$new_student['all_name']."» و با شماره دانشجویی«".$new_student['student_number']."» ثبت گرديد."));
                        }else {
                            return response()->json(array('status'=>false,'msg'=>'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                        }
                    }
                    elseif ($status['status'] == '300') {
                        return response()->json(array('status' => false, 'msg' => 'دانشجویی با این مشخصات قبلا در سیستم ثبت شده است.'));
                    } else {
                        return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                    }
                } else {
                    return response()->json(array('status' => false, 'msg' => $val_form['message']));
                }


            }

        }
    }
}
