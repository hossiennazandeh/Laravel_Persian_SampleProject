<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 22/06/2017
 * Time: 02:05
 */

namespace app\Classes\ValidationForm;

use App\Classes\date\Date_jalali;

class ValidationForm
{
    private $data;
    private $list_status;

    public function __construct($data, $list_status)
    {
        $this->data = $data;
        $this->list_status = $list_status;
    }

    public function init()
    {

        if ($this->list_status['national_code']) {
            $national_code = $this->is_national_code($this->data['national_code']);
            if ($national_code['status']) {

            } else {
                return $national_code;
            }
        }
        if ($this->list_status['email']) {
            $email = $this->is_email($this->data['email']);
            if ($email['status']) {

            } else {
                return $email;
            }
        }
        if ($this->list_status['phone']) {
            $phone = $this->is_phone($this->data['phone']);
            if ($phone['status']) {

            } else {
                return $phone;
            }
        }
        if ($this->list_status['birth_day']) {
            $birth_day = $this->is_birth_day($this->data['birth_day']);
            if ($birth_day['status']) {

            } else {
                return $birth_day;
            }
        }
        if ($this->list_status['mobile']) {
            $mobile = $this->is_mobile($this->data['mobile']);
            if ($mobile['status']) {

            } else {
                return $mobile;
            }
        }
        if ($this->list_status['id']) {
            $id = $this->is_id($this->data['id']);
            if ($id['status']) {

            } else {
                return $id;
            }
        }
        if ($this->list_status['entry_semester']) {
            $entry_semester = $this->is_entry_semester($this->data['entry_semester']);
            if ($entry_semester['status']) {

            } else {
                return $entry_semester;
            }
        }
        if ($this->list_status['password']) {
            $password = $this->is_password($this->data['password']);
            if ($password['status']) {

            } else {
                return $password;
            }
        }
        return array('status' => true);
    }

    // ######## function ##########
    private function is_national_code($national_code)
    {
        if (is_numeric($national_code)) {
            $national_code = (string)$national_code;
//            if (strlen($national_code) == 10) {
//                return array('status' => true);
//            } else {
//                return array('status' => false, 'message' => 'کد ملی باید 10 رقم باشد.');
//            }
            return array('status' => true);
        } else {
            return array('status' => false, 'message' => 'فیلد کد ملی باید به صورت عددی باشد.');
        }
    }

    private function is_email($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    private function is_phone($phone)
    {
        if (is_numeric(str_replace('-', '', $phone))) {
            $phone = (string)$phone;
            if (!preg_match('/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/', $phone)) {
                return array('status' => false, 'message' => 'قالب شماره تلفن ثابت باید به صورت 1111-1111-111 باشد.');
            } else {
                return array('status' => true);
            }
        } else {
            return array('status' => false, 'message' => 'فیلد تلفن باید به صورت عددی باشد.');
        }

    }

    private function is_birth_day($birth_day)
    {
        if (is_numeric(str_replace('/', '', $birth_day))) {
            $birth_day = (string)$birth_day;
            if (!preg_match('/^[0-9]{4}\/[0-9][0-9]\/[0-9][0-9]/', $birth_day)) {
                return array('status' => false, 'message' => 'تاریخ تولد وارد شده باید به صورت 1111/11/11');
            } else {
                list($year, $month, $day) = explode('/', $birth_day);
                $date = new Date_jalali();
                $status = $date->jcheckdate($month, $day, $year);
                if ($status) {
                    $year_now = $date->jdate("Y", time());
                    if ($year < $year_now) {
                        return array('status' => true);
                    } elseif ($year == $year_now) {
                        return array('status' => false, 'message' => 'تاریخ تولد وارد شده معتبر نیوده و برابرسال جاری است.');
                    } else {
                        return array('status' => false, 'message' => 'تاریخ تولد وارد شده معتبر نیوده و ازسال جاری بیشتر است.');

                    }
                } else {
                    return array('status' => false, 'message' => 'تاریخ تولد وارده به صورت نحوی اشتباه است');
                }
            }
        } else {
            return array('status' => false, 'message' => 'فیلد تاریخ باید به صورت عددی باشد.');
        }
    }

    private function is_mobile($mobile)
    {
        if (is_numeric($mobile)) {
            $mobile = (string)$mobile;
            if (strlen($mobile) == 11) {
                return array('status' => true);
            } else {
                return array('status' => false, 'message' => 'شماره موبایل باید 11 رقم باشد.');
            }
        } else {
            return array('status' => false, 'message' => 'فیلد موبایل باید به صورت عددی باشد.');
        }
    }

    private function is_id($id)
    {
        if (is_numeric($id)) {
            return array('status' => true);
        } else {
            return array('status' => false, 'message' => 'شماره شناسنامه باید به صورت عددی باشد.');
        }
    }

    private function is_entry_semester($entry_semester)
    {
        if (!preg_match("/^[0-9]{4}-[الف-ی]/", $entry_semester)) {
            return array('status' => false, 'message' => 'قالب سال ورودی را رعایت کنید.');
        } else {
            $date = new Date_jalali();
            list($year, $month) = explode('-', $entry_semester);
            $year_now = $date->jdate("Y", time());
            if ($year <= $year_now) {
                if ($month == 'مهر' or $month == 'بهمن' or $month == 'تیر') {
                    return array('status' => true);
                } else {
                    return array('status' => false, 'message' => 'ماه ورود دانشجو باید مهر، بهمن و یا تیر باشد.');
                }

            } else {
                return array('status' => false, 'message' => 'سال ورود دانشجو بیشتر از سال جاری است.');
            }

        }
    }

    private function is_password($password)
    {
        if (is_numeric($password)) {
            if (strlen((string)$password) >= 5) {
                return array('status' => true);
            } else {
                return array('status' => false, 'message' => 'طول کلمه عبور باید 5 رقم و یا بیشتر از آن باشد.');
            }
        } else {
            return array('status' => false, 'message' => 'کلمه عبور باید فقط از نوع عددی باشد.');
        }
    }
}