<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementProfessor;
use App\Classes\ImageUploading\ImageUploading;
use App\Classes\ValidationForm\ValidationForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessorEditController extends Controller
{
    public function get($id){
        $professor = new ManagementProfessor();
        $professor = $professor->select_professor($id);
        if ($professor['status'] == '350') {
            $data = $professor['professor'];
            return view('admin.professor_edit', ['active' => 'management_professor', 'professor' => $data, 'id' => $id]);

        } elseif ($professor['status'] == '300') {
            //return page 404
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
                or empty($data['phone'])
                or empty($data['mobile']) or empty($data['address'])
            ) {
                return response()->json(array('status' => false, 'msg' => 'لصفا فیلد های مربوطه را پر کنید.'));

            } else {
                if (empty($data['password'])){
                    $list_status = array('national_code' => true, 'birth_day' => true,
                        'phone' => true, 'mobile' => true, 'id' => false, 'email' => false, 'entry_semester' => false,'password' => false);
                }else{
                    $list_status = array('national_code' => true, 'birth_day' => true,
                        'phone' => true, 'mobile' => true, 'id' => false, 'email' => false, 'entry_semester' => false, 'password' => true);
                }
                $form = new ValidationForm($data, $list_status);
                $val_form = $form->init();
                if ($val_form['status']) {
                    $manage = new ManagementProfessor($data);
                    $status = $manage->check_professor($data['id'],true);
                    if ($status['status'] == '350') {
                        if (empty($data_file)) {

                            $manage = $manage->update_professor($data['id'],$img=null);
                            if ($manage['status'] == '350'){
                                return response()->json(array('status'=>true,
                                    'msg'=>"مشخصات استاد مورد نظر با موفقیت ویرایش شد."));
                            }
                            else{
                                return response()->json(array('status'=>false,'msg'=>'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                            }
                        } else {
                            $old_professor = $manage->select_professor($data['id']);
                            $img = new ImageUploading($data_file, 'media/professor', true);
                            $img = $img->Edit_Image($old_professor['professor']->img);
                            if($img['status'] == true){
                                $manage = $manage->update_professor($data['id'],$img['name_file']);
                                if ($manage['status'] == '350'){
                                    return response()->json(array('status'=>true,
                                        'msg'=>"مشخصات استاد مورد نظر با موفقیت ویرایش شد."));
                                }
                                else{
                                    return response()->json(array('status'=>false,'msg'=>'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                                }
                            }else{
                                return response()->json(array('status'=>false,'msg'=>'فرمت تصویر استاد با فرمت قراردادی سازگار نیست.'));
                            }
                        }

                    } elseif ($status['status'] == '300') {
                        return response()->json(array('status' => false, 'msg' => 'استادی با این مشخصات قبلا در سیستم ثبت شده است.'));
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
