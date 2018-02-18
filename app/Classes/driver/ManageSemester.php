<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 29/08/2017
 * Time: 23:50
 */

namespace app\Classes\driver;


use Illuminate\Support\Facades\DB;

class ManageSemester
{
    private $year;
    private $month;
    private $price;

    function __construct($year = null, $month = null, $price = null)
    {
        $this->year = $year;
        $this->month = $month;
        $this->price = $price;
    }

    private function check_semester()
    {
        try {
            $check = DB::table('semester')->where('year', $this->year)->where('month', $this->month)->get();
            if ($check->isEmpty()) {
                return (array('status' => '350'));
            } else {
                return (array('status' => '300'));

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function insert_semester()
    {
        $check = $this->check_semester();
        if ($check['status'] == '350') {
            try {
                DB::table('semester')->insert(
                    ['year' => $this->year,
                        'month' => $this->month,
                        'price' => $this->price,
                        'status' => 'other'
                    ]
                );
                return (array('status' => '350'));

            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        } elseif ($check['status'] == '300') {
            return (array('status' => '300'));
        } else {
            return (array('status' => '400'));
        }
    }

    public function update_semester($id)
    {
        try {
            DB::table('semester')->where('status', 'now')->update(
                ['status' => 'other',
                ]
            );
            DB::table('semester')->where('id', $id)->update(
                ['status' => 'now',
                ]
            );
            return (array('status' => '350'));
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function get_semester_now($all = null)
    {
        if ($all == null) {
            try {
                $semester = DB::table('semester')->where('status', 'now')->first();
                if ($semester == null) {
                    return (array('status' => '300'));
                } else {
                    $term_now = $semester->year . '-' . $semester->month;
                    return (array('status' => '350', 'term_now' => $term_now));

                }

            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        } else if ($all == true) {
            try {
                $list_semester = [];
                $semester = DB::table('semester')->get();
                if ($semester->isEmpty()) {
                    return (array('status' => '300'));
                } else {
                    foreach ($semester as $one_semester){
                        $one_semester->term = $one_semester->year.'-'.$one_semester->month;
                        unset($one_semester->year);
                        unset($one_semester->month);
                        array_push($list_semester,$one_semester);
                    }
                    return (array('status' => '350', 'list_term' => $list_semester));

                }

            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        }

    }

    public function delete_semester($id)
    {
        try {
            $del = DB::table('semester')->where('id', $id)->delete();
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
