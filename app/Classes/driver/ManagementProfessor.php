<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 25/06/2017
 * Time: 07:22
 */

namespace app\Classes\driver;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagementProfessor
{
    private $data;

    function __construct($data = null)
    {
        $this->data = $data;
    }

    public function count_professor()
    {
        try {
            $count = DB::table('professor')->count();
            return (array('status' => '350', 'count_professor' =>$count));
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function check_professor($id = null, $update = null)
    {
        if ($id == null and $update == null) {
            try {
                $check = DB::table('professor')->where('national_code', $this->data['national_code'])->get();
                if ($check->isEmpty()) {
                    return (array('status' => '350'));
                } else {
                    return (array('status' => '300'));

                }

            } catch (Exception $e) {
                return (array('status' => '400'));
            }

        } elseif ($id != null and $update == null) {
            try {
                $check = DB::table('professor')->where('id', (int)$id)->get();
                if ($check->isEmpty()) {
                    return (array('status' => '350'));
                } else {
                    return (array('status' => '300', 'data' => $check));

                }

            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        } elseif ($id != null and $update != null) {
            try {
                $check = DB::table('professor')->whereNotIn('id', [$id])->where('national_code', $this->data['national_code'])->get();
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

    public function select_professor($id)
    {
        $check = $this->check_professor($id);
        if ($check['status'] == '300') {
            try {
                $select = $check['data'];
                $select = $select[0];
                if ($select->img != null) {
                    $select->img = "media/professor/" . $select->img;
                }
                return (array('status' => '350', 'professor' => $select));
            } catch (Exception $e) {
                return (array('status' => '400'));

            }
        } elseif ($check['status'] == '350') {
            return (array('status' => '300'));
        }
    }

    public function select_professor_name($id)
    {
        try {
            $professor = DB::table('professor')->select('firstname', 'lastname')->where('id', (int)$id)->first();
            if ($professor == null) {
                return (array('status' => '300'));
            } else {
                return (array('status' => '350', 'name' => $professor->firstname . " " . $professor->lastname));

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function insert_professor($img)
    {

        if ($this->data['gender'] == 'male' or $this->data['gender'] == 'female'
        ) {
            $gender = $this->data['gender'];
        } else {
            return (array('status' => '400'));
        }
        $password = (string)$this->data['national_code'];
        $password = Hash::make($password);

        try {
            DB::table('professor')->insert(
                ['firstname' => $this->data['first_name'],
                    'lastname' => $this->data['last_name'], 'father' => $this->data['father_name'],
                    'birthday' => $this->data['birth_day'], 'location_brith' => $this->data['birth_place'],
                    'phone' => $this->data['phone'], 'mobile' => $this->data['mobile'], 'address' => $this->data['address'],
                    'national_code' => $this->data['national_code'], 'sex' => $gender
                    , 'password' => $password, 'img' => $img
                ]
            );
            return (array('status' => '350', 'all_name' => $this->data['first_name'] . " " . $this->data['last_name']));

        } catch (Exception $e) {
            return (array('status' => '400'));
        }


    }

    public function update_professor($id, $img)
    {
        if ($this->data['gender'] == 'male' or $this->data['gender'] == 'female'
        ) {
            $gender = $this->data['gender'];
        } else {
            return (array('status' => '400'));
        }
        $password = (string)$this->data['national_code'];
        if ($img == null) {
            if ($password == null) {
                try {
                    DB::table('professor')
                        ->where('id', $id)
                        ->update(['firstname' => $this->data['first_name'], 'lastname' => $this->data['last_name'],
                            'father' => $this->data['father_name'], 'birthday' => $this->data['birth_day'],
                            'location_brith' => $this->data['birth_place'], 'phone' => $this->data['phone'],
                            'mobile' => $this->data['mobile'], 'address' => $this->data['address'],
                            'national_code' => $this->data['national_code'], 'sex' => $gender]);
                    return (array('status' => '350'));

                } catch (Exception $e) {
                    return (array('status' => '400'));
                }
            } else {
                $password = (string)Hash::make($password);
                try {
                    DB::table('professor')
                        ->where('id', $id)
                        ->update(['firstname' => $this->data['first_name'], 'lastname' => $this->data['last_name'],
                            'father' => $this->data['father_name'], 'birthday' => $this->data['birth_day'],
                            'location_brith' => $this->data['birth_place'], 'phone' => $this->data['phone'],
                            'mobile' => $this->data['mobile'], 'address' => $this->data['address'],
                            'national_code' => $this->data['national_code'], 'password' => $password]);
                    return (array('status' => '350'));

                } catch (Exception $e) {
                    return (array('status' => '400'));
                }
            }
        } else {
            if ($password == null) {
                try {
                    DB::table('professor')
                        ->where('id', $id)
                        ->update(['firstname' => $this->data['first_name'], 'lastname' => $this->data['last_name'],
                            'father' => $this->data['father_name'], 'birthday' => $this->data['birth_day'],
                            'location_brith' => $this->data['birth_place'], 'phone' => $this->data['phone'],
                            'mobile' => $this->data['mobile'], 'address' => $this->data['address'],
                            'national_code' => $this->data['national_code'], 'img' => $img]);
                    return (array('status' => '350'));

                } catch (Exception $e) {
                    return (array('status' => '400'));
                }
            } else {
                try {
                    $password = (string)Hash::make($password);
                    DB::table('professor')
                        ->where('id', $id)
                        ->update(['firstname' => $this->data['first_name'], 'lastname' => $this->data['last_name'],
                            'father' => $this->data['father_name'], 'birthday' => $this->data['birth_day'],
                            'location_brith' => $this->data['birth_place'], 'phone' => $this->data['phone'],
                            'mobile' => $this->data['mobile'], 'address' => $this->data['address'],
                            'national_code' => $this->data['national_code'], 'password' => $password, 'img' => $img]);
                    return (array('status' => '350'));

                } catch (Exception $e) {
                    return (array('status' => '400'));
                }
            }

        }
    }

    public function delete_professor($id)
    {
        try {
            $del = DB::table('professor')->where('id', $id)->delete();
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