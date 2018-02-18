<?php

namespace App\Http\Controllers\Admin;

use App\Classes\CreateSemester\CreateSemester;
use App\Classes\driver\ManageSemester;
use App\Classes\pagination\pagination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SemesterController extends Controller
{
    public function get($page_num)
    {
        $limit = 10;
        $obj_pagination = new pagination("semester", $page_num, $limit);
        $semester = $obj_pagination->paginate('year');
        $counter_semester = $page_num * $limit - $limit;
        $manage_year = new CreateSemester(10);
        $list_year = $manage_year->create_year();
        if ($semester['status'] == '350') {
            $data = $semester['data'];
            return view('admin.semester', ['counter_semester' => $counter_semester, 'list_year' => $list_year, 'semester' => $data, 'page_now' => $page_num, 'all_page' => $semester['count'], 'active' => 'management_semester']);
        } elseif ($semester['status'] == '300') {
            return view('admin.semester', ['counter_semester' => $counter_semester, 'list_year' => $list_year, 'semester' => false, 'page_now' => $page_num, 'all_page' => '', 'active' => 'management_semester']);

        } else {
            //error baraye safhe moshke fani
        }
    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == 'new_semester') {
                if (empty($data['year']) or empty($data['month']) or empty($data['price'])) {
                    return response()->json(array('status' => false, 'msg' => 'لصفا فیلد های مربوطه را پر کنید.'));
                } elseif (is_numeric($data['price'])) {
                    $manage_semester = new ManageSemester($data['year'], $data['month'], $data['price']);
                    $insert_semester = $manage_semester->insert_semester();
                    if ($insert_semester['status'] == '350') {
                        return response()->json(array('status' => true, 'msg' => 'عملیات شما با موفقیت انجام شد.'));
                    } elseif ($insert_semester['status'] == '300') {
                        return response()->json(array('status' => false, 'msg' => 'ترم که وارد کردید تکراری است.'));
                    } else {
                        return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                    }
                } else {
                    return response()->json(array('status' => false, 'msg' => 'لصفا فیلد قیمت را به صورت عددی وارد کنید.'));
                }
            } elseif ($data['status'] == 'change_semester') {
                $manage_semester = new ManageSemester();
                $change_semester = $manage_semester->update_semester($data['id']);
                if ($change_semester['status'] == '350') {
                    return response()->json(array('status' => true));
                } else {
                    return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));

                }
            } elseif ($data['status'] == 'delete') {
                $manage_semester = new ManageSemester();
                $del_semester = $manage_semester->delete_semester($data['id']);
                if ($del_semester['status'] == '350') {
                    return response()->json(array('status' => true,'msg'=>'ترم مورد نظر با موفقیت حذف شد.'));
                } else {
                    return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }
            }
        }

    }
}
