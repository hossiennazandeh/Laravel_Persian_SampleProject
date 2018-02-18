<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 01/07/2017
 * Time: 20:03
 */

namespace app\Classes\driver;


use Illuminate\Support\Facades\DB;

class ManagementClasses
{
    private $name_class;
    private $number_class;

    function __construct($name_class = null, $number_class = null)
    {
        $this->name_class = $name_class;
        $this->number_class = $number_class;
    }

    public function check_class($field = null, $update = null)
    {
        if ($field == null and $update == null) {
            try {
                $check = DB::table('class')->where('name', $this->name_class)->orwhere('number', $this->number_class)->get();
                if ($check->isEmpty()) {
                    return (array('status' => '350'));
                } else {
                    return (array('status' => '300'));

                }

            } catch (Exception $e) {
                return (array('status' => '400'));
            }

        } elseif ($field != null and $update == null) {
            try {
                $check = DB::table('class')->where('id', (int)$field)->get();
                if ($check->isEmpty()) {
                    return (array('status' => '350'));
                } else {
                    return (array('status' => '300', 'data' => $check));

                }

            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        } elseif ($field != null and $update != null) {
            try {
                $check = DB::table('class')->whereNotIn('id', [$field])->where('name', $this->name_class)->get();
                $check_number = DB::table('class')->whereNotIn('id', [$field])->where('number', $this->number_class)->get();
                if ($check->isEmpty() and $check_number->isEmpty()) {
                    return (array('status' => '350'));
                } else {
                    return (array('status' => '300', 'data' => $check));

                }

            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        }
    }

    public function insert_class()
    {
        try {
            DB::table('class')->insert(
                ['name' => $this->name_class,
                    'number' => $this->number_class,
                ]
            );
            return (array('status' => '350', 'name' => $this->name_class, 'number' => $this->number_class));

        } catch (Exception $e) {
            return (array('status' => '400', 'message' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
        }


    }

    public function select_class($id)
    {
        $check = $this->check_class($id);
        if ($check['status'] == '300') {
            try {
                $select = $check['data'];
                $select = $select[0];
                return (array('status' => '350', 'class' => $select));
            } catch (Exception $e) {
                return (array('status' => '400'));

            }
        } elseif ($check['status'] == '350') {
            return (array('status' => '300'));
        }
    }

    public function update_class($id)
    {

        try {
            DB::table('class')->where('id', $id)->update(
                ['name' => $this->name_class,
                    'number' => $this->number_class
                ]
            );
            return (array('status' => '350'));
        } catch (Exception $e) {
            return (array('status' => '400', 'message' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
        }
    }

    public function delete_class($id)
    {
        try {
            $del = DB::table('class')->where('id', $id)->delete();
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