<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 22/06/2017
 * Time: 01:23
 */

namespace app\Classes\driver;


use App\Classes\date\Date_jalali;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagementStudent
{
    private $data;

    function __construct($data = null)
    {
        $this->data = $data;
    }

    public function count_student(){
        try {
            $count = DB::table('student')->count();
            return(array('status'=>'350','count_student'=>$count));
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }
    public function check_student($student_number = null, $update = null)
    {
        if ($student_number == null and $update == null) {
            try {
                $check = DB::table('student')->where('national_code', $this->data['national_code'])->get();
                if ($check->isEmpty()) {
                    return (array('status' => '350'));
                } else {
                    return (array('status' => '300'));

                }

            } catch (Exception $e) {
                return (array('status' => '400'));
            }

        } elseif ($student_number != null and $update == null) {
            try {
                $check = DB::table('student')->where('student_number', (int)$student_number)->get();
                if ($check->isEmpty()) {
                    return (array('status' => '350'));
                } else {
                    return (array('status' => '300', 'data' => $check));

                }

            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        } elseif ($student_number != null and $update != null) {
            try {
                $check = DB::table('student')->whereNotIn('student_number', [$student_number])->where('national_code', $this->data['national_code'])->get();
                if ($check->isEmpty()) {
                    return (array('status' => '350'));
                } else {
                    return (array('status' => '300', 'data' => $check));

                }

            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        }
    }


    public function insert_student($img)
    {

        if ($this->data['commodity_situation'] == 'active' or
            $this->data['commodity_situation'] == 'non_active' or
            $this->data['commodity_situation'] == 'expulsion' or
            $this->data['commodity_situation'] == 'alumnus'
        ) {
            $status_student = $this->data['commodity_situation'];
        } else {
            return (array('status' => '400'));
        }
        $password = (string)$this->data['national_code'];
        $password = Hash::make($password);
        $news_student_number = $this->create_student_number();
        if ($news_student_number['status'] == '350' or $news_student_number['status'] == '300') {
            try {
                DB::table('student')->insert(
                    ['student_number' => (int)$news_student_number['new_number'], 'firstname' => $this->data['first_name'],
                        'lastname' => $this->data['last_name'], 'father' => $this->data['father_name'],
                        'brithday' => $this->data['birth_day'], 'location_brith' => $this->data['birth_place'],
                        'phone' => $this->data['phone'], 'mobile' => $this->data['mobile'], 'address' => $this->data['address'],
                        'national_code' => $this->data['national_code'], 'id' => $this->data['id'], 'status' => $status_student,
                        'entry_semester' => $this->data['entry_semester'], 'password' => $password, 'img' => $img
                    ]
                );
                return (array('status' => '350', 'all_name' => $this->data['first_name'] . " " . $this->data['last_name'],
                    'student_number' => (int)$news_student_number['new_number']));

            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        } elseif ($news_student_number['status'] == '420') {
            return (array($news_student_number));
        } else {
            return (array('status' => '400'));
        }

    }

    public function select_student($entry_semester)
    {
        $check = $this->check_student($entry_semester);
        if ($check['status'] == '300') {
            try {
                $select = $check['data'];
                $select = $select[0];
                if ($select->img != null) {
                    $select->img = "media/student/" . $select->img;
                }
                return (array('status' => '350', 'student' => $select));
            } catch (Exception $e) {
                return (array('status' => '400'));

            }
        } elseif ($check['status'] == '350') {
            return (array('status' => '300'));
        }
    }

    public function update_student($student_number, $img)
    {

        if ($this->data['commodity_situation'] == 'active' or
            $this->data['commodity_situation'] == 'non_active' or
            $this->data['commodity_situation'] == 'expulsion' or
            $this->data['commodity_situation'] == 'alumnus'
        ) {
            $status_student = $this->data['commodity_situation'];
        } else {
            return (array('status' => '400'));
        }

        $password = $this->data['password'];
        if ($img == null) {
            if ($password == null){
                try {
                    DB::table('student')
                        ->where('student_number', $student_number)
                        ->update(['firstname' => $this->data['first_name'], 'lastname' => $this->data['last_name'],
                            'father' => $this->data['father_name'], 'brithday' => $this->data['birth_day'],
                            'location_brith' => $this->data['birth_place'], 'phone' => $this->data['phone'],
                            'mobile' => $this->data['mobile'], 'address' => $this->data['address'],
                            'national_code' => $this->data['national_code'], 'id' => $this->data['id'],
                            'status' => $status_student, 'entry_semester' => $this->data['entry_semester']]);
                    return (array('status' => '350'));

                } catch (Exception $e) {
                    return (array('status' => '400'));
                }
            }else{
                $password =(string) Hash::make($password);
                try {
                    DB::table('student')
                        ->where('student_number', $student_number)
                        ->update(['firstname' => $this->data['first_name'], 'lastname' => $this->data['last_name'],
                            'father' => $this->data['father_name'], 'brithday' => $this->data['birth_day'],
                            'location_brith' => $this->data['birth_place'], 'phone' => $this->data['phone'],
                            'mobile' => $this->data['mobile'], 'address' => $this->data['address'],
                            'national_code' => $this->data['national_code'], 'id' => $this->data['id'],
                            'status' => $status_student, 'entry_semester' => $this->data['entry_semester'],
                            'password' => $password]);
                    return (array('status' => '350'));

                } catch (Exception $e) {
                    return (array('status' => '400'));
                }
            }
        } else {
            if ($password == null){
                try {
                    DB::table('student')
                        ->where('student_number', $student_number)
                        ->update(['firstname' => $this->data['first_name'], 'lastname' => $this->data['last_name'],
                            'father' => $this->data['father_name'], 'brithday' => $this->data['birth_day'],
                            'location_brith' => $this->data['birth_place'], 'phone' => $this->data['phone'],
                            'mobile' => $this->data['mobile'], 'address' => $this->data['address'],
                            'national_code' => $this->data['national_code'], 'id' => $this->data['id'],
                            'status' => $status_student, 'entry_semester' => $this->data['entry_semester'], 'img'=>$img]);
                    return (array('status' => '350'));

                } catch (Exception $e) {
                    return (array('status' => '400'));
                }
            }else{
                try {
                    $password =(string) Hash::make($password);
                    DB::table('student')
                        ->where('student_number', $student_number)
                        ->update(['firstname' => $this->data['first_name'], 'lastname' => $this->data['last_name'],
                            'father' => $this->data['father_name'], 'brithday' => $this->data['birth_day'],
                            'location_brith' => $this->data['birth_place'], 'phone' => $this->data['phone'],
                            'mobile' => $this->data['mobile'], 'address' => $this->data['address'],
                            'national_code' => $this->data['national_code'], 'id' => $this->data['id'],
                            'status' => $status_student, 'entry_semester' => $this->data['entry_semester'],
                            'password' => $password,'img'=>$img]);
                    return (array('status' => '350'));

                } catch (Exception $e) {
                    return (array('status' => '400'));
                }
            }

        }
    }

    private function create_student_number()
    {
        list($year, $month) = explode('-', $this->data['entry_semester']);
        $year = substr($year, 1, 4);
        if ($month == "مهر") {
            $month = 2;
        } elseif ($month == "بهمن") {
            $month = 3;
        } elseif ($month == "تیر") {
            $month = 1;
        }
        $last_number = $this->found_last_student_number($year, $month);
        if ($last_number['status'] == '300') {
            if ($last_number['student_number'] == $year . $month . "999") {
                return (array('status' => '420', 'message' => 'سیستم در ساخت شماره دانشجویی دچار مشکل شده لطفا این مورد را به کادر فنی گذارش دهید'));
            } else {
                $new_number = $last_number['student_number'] + 1;
                return (array('status' => '300', 'new_number' => $new_number));
            }
        } elseif ($last_number['status'] == '350') {
            return (array('status' => '350', 'new_number' => $year . $month . "001"));

        } else {
            return (array('status' => '400'));

        }


    }

    private function found_last_student_number($year, $month)
    {
        try {
            $number = DB::table('student')->orderBy('student_number', 'desc')
                ->where('student_number', 'like', $year . $month . '%')->first();
            if ($number == null) {
                return (array('status' => '350'));
            } else {
                return (array('status' => '300', 'student_number' => $number->student_number));
            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }

    }
    public function delete_student($student_number)
    {
        try {
            $del = DB::table('student')->where('student_number', $student_number)->delete();
            if ($del == 1) {
                return (array('status' => '350'));
            } else {
                return (array('status' => '300'));
            }
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }
}