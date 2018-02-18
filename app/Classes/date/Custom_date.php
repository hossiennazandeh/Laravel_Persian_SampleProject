<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 28/05/2017
 * Time: 15:57
 */

namespace App\Classes\date;

use App\Classes\date\Date_jalali;


class Custom_date
{
    private $date;
    function __construct()
    {
        $this->date = new Date_jalali();
    }
    public function today_time(){
        $today_time = $this->date->jdate("j F Y - h:m", time());
        return $today_time;
    }
    public function year_now(){
        $year_now= $this->date->jdate("Y", time());
        return $year_now;
    }

}