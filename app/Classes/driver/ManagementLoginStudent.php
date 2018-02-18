<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 19/08/2017
 * Time: 14:09
 */

namespace app\Classes\driver;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ManagementLoginStudent
{
    public function check_admin($username, $password)
    {
        try {
            $auth_student = DB::table('student')->select('password')->where('student_number', $username)->first();
            if ($auth_student == null) {
                return (array('status' => '300', 'msg' => 'نام کاربری شما اشتباه است'));
            } else {
                if (Hash::check($password, $auth_student->password)) {
                    Session::put('login_student', $username);
                    return (array('status' => '350'));
                } else {
                    return (array('status' => '300', 'msg' => 'پسورد شما اشتباه است'));

                }

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function check_username($username)
    {
        try {
            $auth_student = DB::table('student')->where('student_number', $username)->first();
            if ($auth_student == null) {
                return (array('status' => '300'));
            } else {
                return (array('status' => '350'));
            }
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }
}