<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 30/08/2017
 * Time: 00:09
 */

namespace app\Classes\CreateSemester;


use App\Classes\date\Custom_date;

class CreateSemester
{
    private $limit_year;

    function __construct($limit_year = 5)
    {
        $this->limit_year = $limit_year;
    }

    public function create_year()
    {
        $list_year = [];
        $manage_time = new Custom_date();
        $year_now = $manage_time->year_now();
        for ($i = 0; $i <=$this->limit_year; $i++) {
            if ($i == 0){
                $tmp_year_add = (int)$year_now + $i;
                array_push($list_year,$tmp_year_add);
            }else{
                $tmp_year_add = (int)$year_now + $i;
                $tmp_year_min = (int)$year_now - $i;
                array_push($list_year, $tmp_year_add);
                array_push($list_year,$tmp_year_min);
            }

        }
        sort($list_year);
        return $list_year;
    }
}