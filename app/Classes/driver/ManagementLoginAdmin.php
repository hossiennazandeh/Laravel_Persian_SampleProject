<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 26/07/2017
 * Time: 15:19
 */

namespace app\Classes\driver;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ManagementLoginAdmin
{
    public function check_admin($username,$password){
        try {
            $auth_admin = DB::table('admin')->select('password')->where('username', $username)->first();
            if ($auth_admin == null) {
                return (array('status' => '300','msg'=>'نام کاربری شما اشتباه است'));
            } else {
                if (Hash::check($password, $auth_admin->password)) {
                    Session::put('login_admin', $username);
                    return (array('status' => '350'));
                }else{
                    return (array('status' => '300','msg'=> 'پسورد شما اشتباه است'));

                }

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function set_admin($username,$password){
        $password = Hash::make($password);
        try {
            DB::table('admin')->insert(
                ['username' => $username,
                    'password' => $password,
                ]
            );
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }
    public function check_username($username){
        try {
            $auth_admin = DB::table('admin')->where('username', $username)->first();
            if ($auth_admin == null) {
                return (array('status' => '300'));
            } else {
                    return (array('status' => '350'));
            }
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

}