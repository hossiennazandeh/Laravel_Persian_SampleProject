<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 16/08/2017
 * Time: 17:12
 */

namespace app\Classes\Search\admin;


use Illuminate\Support\Facades\DB;

class SearchStudent
{
    public function search($item)
    {
        $list_item = explode(' ', $item, 2);
        if (count($list_item) < 2) {
            try {
                $search = DB::table('student')->where('student_number', 'LIKE', '%' . $list_item[0] . '%')->orwhere('firstname', 'LIKE', '%' . $list_item[0] . '%')->orwhere('lastname', 'LIKE', '%' . $list_item[0] . '%')->orderBy('student_number', 'desc')->get();
                if ($search->isEmpty()) {
                    return (array('status' => '300'));
                } else {
                    foreach ($search as $one_search){
                        if ($one_search->status == 'active'){
                            $one_search->status = 'در حال تحصیل';
                        }elseif ($one_search->status == 'none_active'){
                            $one_search->status = 'معلق';
                        }else{
                            $one_search->status = 'اخراج شده';
                        }
                    }
                    return (array('status' => '350', 'search' => $search));
                }
            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        } else {
            try {
                $search = DB::table('student')->where('firstname', 'LIKE', '%' . $list_item[0] . '%')->where('lastname', 'LIKE', '%' . $list_item[1] . '%')->orderBy('student_number', 'desc')->get();
                if ($search->isEmpty()) {
                    return (array('status' => '300'));
                } else {
                    foreach ($search as $one_search){
                        if ($one_search->status == 'active'){
                            $one_search->status = 'در حال تحصیل';
                        }elseif ($one_search->status == 'none_active'){
                            $one_search->status = 'معلق';
                        }else{
                            $one_search->status = 'اخراج شده';
                        }
                    }
                    return (array('status' => '350', 'search' => $search));
                }
            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        }

    }
}