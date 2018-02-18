<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementStudent;
use App\Classes\ImageUploading\ImageUploading;
use App\Classes\ValidationForm\ValidationForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\driver\ManageSemester;


class StudentEditController extends Controller
{
    public function get($student_number)
    {
        $student = new ManagementStudent();
        $student = $student->select_student($student_number);
        $manage_semester = new  ManageSemester();
        $all_semester = $manage_semester->get_semester_now(true);
        if ($student['status'] == '350' and $all_semester['status'] == '350') {
            $data = $student['student'];
            return view('admin.student_edit', ['active' => 'management_student', 'student' => $data, 'student_number' => $student_number, 'list_term' => $all_semester]);

        } elseif ($student['status'] == '300') {
            //return page 404
        } elseif ($student['status'] == '350' and $all_semester['status'] == '300'){
            $data = $student['student'];
            return view('admin.student_edit', ['active' => 'management_student', 'student' => $data, 'student_number' => $student_number, 'list_term' => false]);
        } else {
            // page moshkele fani
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
                    $status = $manage->check_student($data['student_number'],true);
                    if ($status['status'] == '350') {
                        if (empty($data_file)) {
                            $manage = $manage->update_student($data['student_number'],$img=null);
                            if ($manage['status'] == '350'){
                                return response()->json(array('status'=>true,
                                    'msg'=>"مشخصات دانشجوی مورد نظر با موفقیت ویرایش شد."));
                            }
                            else{
                                return response()->json(array('status'=>false,'msg'=>'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                            }
                        } else {
                            $old_student = $manage->select_student($data['student_number']);
                            $img = new ImageUploading($data_file, 'media/student', true);
                            $img = $img->Edit_Image($old_student['student']->img);
                            if($img['status'] == true){
                                $manage = $manage->update_student($data['student_number'],$img['name_file']);
                                if ($manage['status'] == '350'){
                                    return response()->json(array('status'=>true,
                                        'msg'=>"مشخصات دانشجوی مورد نظر با موفقیت ویرایش شد."));
                                }
                                else{
                                    return response()->json(array('status'=>false,'msg'=>'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                                }
                            }else{
                                return response()->json(array('status'=>false,'msg'=>'فرمت تصویر دانشجو با فرمت قراردادی سازگار نیست.'));
                            }
                        }

                    } elseif ($status['status'] == '300') {
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
