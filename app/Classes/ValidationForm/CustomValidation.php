<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 15/07/2017
 * Time: 12:53
 */

namespace app\Classes\ValidationForm;


use App\Classes\date\Date_jalali;

class CustomValidation
{
    public function is_date_exam($date)
    {
        if (is_numeric(str_replace('/', '', $date))) {
            $date = (string)$date;
            if (!preg_match('/^[0-9]{4}\/[0-9][0-9]\/[0-9][0-9]/', $date)) {
                return array('status' => false, 'message' => 'تاریخ  وارد شده باید به صورت 1111/11/11');
            } else {
                list($year, $month, $day) = explode('/', $date);
                $date = new Date_jalali();
                $status = $date->jcheckdate($month, $day, $year);
                if ($status) {
                    $year_now = $date->jdate("Y", time());
                    $month_now = $date->jdate("m", time());
                    if ($year > $year_now) {
                        return array('status' => true);
                    } elseif ($year == $year_now) {
                        if ($month >= $month_now) {

                            return array('status' => true);
                        } else {
                            return array('status' => false, 'message' => 'تاریخ تولد وارد شده معتبر نبوده و ماه وارده از ماه کنونی کمتر  است.');
                        }
                    } else {
                        return array('status' => false, 'message' => 'تاریخ تولد وارد شده معتبر نبوده و ازسال جاری کمتر است.');

                    }
                } else {
                    return array('status' => false, 'message' => 'تاریخ تولد وارده به صورت نحوی اشتباه است');
                }
            }
        } else {
            return array('status' => false, 'message' => 'فیلد تاریخ باید به صورت عددی باشد.');
        }
    }

    public function is_semester($semester)
    {
        if (!preg_match("/^[0-9]{4}-[الف-ی]/", $semester)) {
            return array('status' => false, 'message' => 'قالب سال ورودی را رعایت کنید.');
        } else {
            $date = new Date_jalali();
            list($year, $month) = explode('-', $semester);
            $year_now = $date->jdate("Y", time());
            if ($year <= $year_now) {
                if ($month == 'مهر' or $month == 'بهمن' or $month == 'تیر') {
                    return array('status' => true);
                } else {
                    return array('status' => false, 'message' => 'ماه ترم باید مهر، بهمن و یا تیر باشد.');
                }

            } else {
                return array('status' => false, 'message' => 'سال ترم بیشتر از سال جاری است.');
            }

        }
    }
}