<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 30/08/2017
 * Time: 20:34
 */

namespace app\Classes\Search\admin;


use Illuminate\Support\Facades\DB;

class SearchNews
{
    public function search($item){
        try {
            $search = DB::table('comments')->where('name','LIKE','%'.$item.'%')->orwhere('subject','LIKE','%'.$item.'%')
                ->orwhere('message','LIKE','%'.$item.'%')->orwhere('email','LIKE','%'.$item.'%')->orderBy('id', 'desc')->get();
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