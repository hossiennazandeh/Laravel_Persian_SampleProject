<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementProfessor;
use App\Classes\ImageUploading\ImageUploading;
use App\Classes\ValidationForm\ValidationForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessorNewController extends Controller
{
    public function get()
    {
        return view('admin.professor_new', ['active' => 'management_professor']);
    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $data_file = $request->file('file');
            if (empty($data['first_name']) or empty($data['last_name'])
                or empty($data['father_name']) or empty($data['birth_day'])
                or empty($data['birth_place']) or empty($data['national_code'])
                or empty($data['phone']) or empty($data['mobile']) or empty($data['address'])
            ) {
                return response()->json(array('status' => false, 'msg' => 'لصفا فیلد های مربوطه را پر کنید.'));

            } else {
                $list_status = array('national_code' => true, 'birth_day' => true,
                    'phone' => true, 'mobile' => true, 'id' => false, 'email' => false, 'entry_semester' => false, 'password' => false);
                $form = new ValidationForm($data, $list_status);
                $val_form = $form->init();
                if ($val_form['status']) {
                    $manage = new ManagementProfessor($data);
                    $status = $manage->check_professor();
                    if ($status['status'] == '350') {
                        if (empty($data_file)) {
                            $img = null;
                        } else {
                            $img = new ImageUploading($data_file, 'media/professor', true);
                            $img = $img->setImage();
                            if ($img['status'] == true) {
                                $img = $img['name_file'];
                            } else {
                                return response()->json(array('status' => false, 'msg' => 'فرمت تصویر  با فرمت قراردادی سازگار نیست.'));
                            }
                        }
                        $new_professor = $manage->insert_professor($img);
                        if ($new_professor['status'] == '350') {
                            return response()->json(array('status' => true,
                                'msg' => "استاد با نام «" . $new_professor['all_name'] . "»  ثبت گرديد."));
                        } else {
                            return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید'));
                        }
                    } elseif ($status['status'] == '300') {
                        return response()->json(array('status' => false, 'msg' => 'این استاد قبلا ثبت شده است.'));
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
