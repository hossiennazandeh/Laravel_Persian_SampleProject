<?php

namespace App\Http\Controllers\Admin;

use App\Classes\driver\ManagementProfessor;
use App\Classes\ImageUploading\ImageUploading;
use App\Classes\pagination\pagination;
use App\Classes\Search\admin\SearchProfessor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessorController extends Controller
{
    public function get($page_num)
    {
        $limit = 10;
        $obj_pagination = new pagination("professor", $page_num, $limit);
        $professor = $obj_pagination->paginate('id');
        $counter_professor = $page_num * $limit - $limit;
        if ($professor['status'] == '350') {
            return view('admin.professor', ['counter_professor' => $counter_professor, 'professor' => $professor['data']
                , 'page_now' => $page_num, 'all_page' => $professor['count'], 'active' => 'management_professor']);
        } elseif ($professor['status'] == '300') {
            return view('admin.professor', ['counter_professor' => $counter_professor, 'professor' => false,
                'page_now' => $page_num, 'all_page' => '', 'active' => 'management_professor']);

        } else {
            //error baraye safhe moshke fani
        }
    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->input('status');
            if ($status == 'delete') {
                $id = (int)$request->input('id');
                $manage = new  ManagementProfessor();
                $professor = $manage->select_professor($id);
                if ($professor['status'] == '350') {
                    $img = $professor['professor']->img;
                    $del_professor = $manage->delete_professor($id);
                    if ($del_professor['status'] == '350') {
                        $del_img = new ImageUploading();
                        $del_img = $del_img->delete_Image($img);
                        if ($del_img['status'] == '350') {
                            return response()->json(array('status' => true,
                                'msg' => "استاد مورد نظر با موفقیت حذف شد."));
                        } else {
                            return response()->json(array('status' => false,
                                'msg' => "تصویر استاد برای حذف یافت نشد لصفا به واحد فنی اطلاع دهید."));
                        }
                    } elseif ($del_professor['300']) {
                        return response()->json(array('status' => false,
                            'msg' => "سیستم قادر به حذف این استاد نیست لصفا به واحد فنی اطلاع دهید."));
                    } else {
                        return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                    }

                } elseif ($professor['status'] == '300') {
                    return response()->json(array('status' => true,
                        'msg' => "هیچ استادی با این شماره شناسایی برای حذف کردن یافت نشد. لطفا این امر را به کادر فنی گذارش دهید."));
                } else {
                    return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }
            } elseif ($status == 'search') {
                $item = $request->input('item');
                $manage = new SearchProfessor();
                $search = $manage->search($item);
                if ($search['status'] == '350'){
                    return response()->json(array('status' => true,
                        'data' => $search['search']));
                }else if ($search['status'] == '300'){
                    return response()->json(array('status' => false));
                }else{
                    return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }
            }
        }

    }
}
