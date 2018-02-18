<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 16/08/2017
 * Time: 19:10
 */

namespace app\Classes\Search\admin;


use Illuminate\Support\Facades\DB;

class SearchProfessor
{
    public function search($item)
    {
        $list_item = explode(' ', $item, 2);
        if (count($list_item) < 2) {
            try {
                $search = DB::table('professor')->where('national_code', 'LIKE', '%' . $list_item[0] . '%')->orwhere('firstname', 'LIKE', '%' . $list_item[0] . '%')->orwhere('lastname', 'LIKE', '%' . $list_item[0] . '%')->orderBy('id', 'desc')->get();
                if ($search->isEmpty()) {
                    return (array('status' => '300'));
                } else {
                    return (array('status' => '350', 'search' => $search));
                }
            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        } else {
            try {
                $search = DB::table('professor')->where('firstname', 'LIKE', '%' . $list_item[0] . '%')->where('lastname', 'LIKE', '%' . $list_item[1] . '%')->orderBy('id', 'desc')->get();
                if ($search->isEmpty()) {
                    return (array('status' => '300'));
                } else {
                    return (array('status' => '350', 'search' => $search));
                }
            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        }

    }

}