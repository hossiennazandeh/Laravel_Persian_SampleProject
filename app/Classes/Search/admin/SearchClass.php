<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 15/08/2017
 * Time: 18:37
 */

namespace app\Classes\Search\admin;


use Illuminate\Support\Facades\DB;

class SearchClass
{
    public function search($item){
        try {
            $search = DB::table('class')->where('name','LIKE','%'.$item.'%')->orwhere('number','LIKE','%'.$item.'%')->orderBy('number', 'desc')->get();
            if ($search->isEmpty()) {
                return (array('status' => '300'));
            } else {
                return (array('status' => '350','search'=> $search));
            }
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

}