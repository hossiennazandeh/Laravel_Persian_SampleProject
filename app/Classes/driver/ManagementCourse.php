<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 29/06/2017
 * Time: 14:20
 */

namespace app\Classes\driver;


use Illuminate\Support\Facades\DB;

class ManagementCourse
{
    private $data;

    function __construct($data = null)
    {
        $this->data = $data;
    }

    public function count_course()
    {
        try {
            $count = DB::table('course')->count();
            return(array('status'=>'350','count_course'=>$count));
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function check_course($field = null, $update = null)
    {
        if ($field == null and $update == null) {
            try {
                $check = DB::table('course')->where('name', $this->data['name'])->get();
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
                $check = DB::table('course')->where('id', (int)$field)->get();
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
                $check = DB::table('course')->whereNotIn('id', [$field])->where('name', $this->data['name'])->get();
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

    public function insert_course()
    {

        if ($this->data['type'] == 'public' or $this->data['type'] == 'basic' or
            $this->data['type'] == 'prime' or $this->data['type'] == 'professional'

        ) {
            $type = $this->data['type'];
        } else {
            return (array('status' => '400', 'message' => 'سیستم در انتخاب نوع  درس دچار مشکل شده لطفا این مورد را به واحد فنی گزارش دهید.'));
        }
        if ($this->data['presentation'] == 'theoretic' or $this->data['presentation'] == 'practical') {
            $presentation = $this->data['presentation'];
        } else {
            return (array('status' => '400', 'message' => 'سیستم در انتخاب نوع ارئه درس دچار مشکل شده لطفا این مورد را به واحد فنی گزارش دهید.'));
        }
        if ($this->data['status_prerequisite'] == 'yes' or $this->data['status_prerequisite'] == 'no') {
            $status_prerequisite = $this->data['status_prerequisite'];
        } else {
            return (array('status' => '400', 'message' => 'سیستم در حالت پیش نیازی دچار مشکل شده لطفا این مورد را به واحد فنی گزارش دهید.'));
        }

        if ($this->data['prerequisite'] == null) {
            $list_prerequisite = null;
        } else {
            $list_prerequisite = implode(',', $this->data['prerequisite']);
        }
        try {
            DB::table('course')->insert(
                ['name' => $this->data['name'],
                    'presentation' => $presentation, 'type' => $type,
                    'unit_number' => $this->data['unit_number'], 'price' => $this->data['price'],
                    'status_prerequisite' => $status_prerequisite, 'list_prerequisite' => $list_prerequisite
                ]
            );
            return (array('status' => '350', 'name_course' => $this->data['name']));

        } catch (Exception $e) {
            return (array('status' => '400', 'message' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
        }


    }

    public function get_prerequisite_course()
    {
        try {
            $pre_course = DB::table('course')->select('name')->where('status_prerequisite', 'yes')->get();
            if ($pre_course->isEmpty()) {
                return (array('status' => '300'));
            } else {
                return (array('status' => '350', 'data' => $pre_course));

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function select_course($id)
    {
        $check = $this->check_course($id);
        if ($check['status'] == '300') {
            try {
                $select = $check['data'];
                $select = $select[0];
                return (array('status' => '350', 'course' => $select));
            } catch (Exception $e) {
                return (array('status' => '400'));

            }
        } elseif ($check['status'] == '350') {
            return (array('status' => '300'));
        }
    }

    public function delete_course($id, $name)
    {
        try {
            $del = DB::table('course')->where('id', $id)->delete();
            if ($del == 1) {
                $del_pre = $this->delete_prerequisite_course($name);
                if ($del_pre['status'] == '400') {
                    return (array('status' => '400'));
                }
                return (array('status' => '350'));
            } else {
                return (array('status' => '300'));
            }
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function select_course_custom($id, $par1, $par2 = null)
    {
        try {
            if ($par2 == null) {
                $result = DB::table('course')->select($par1)->where('id', (int)$id)->first();
            } else {
                $result = DB::table('course')->select($par1, $par2)->where('id', (int)$id)->first();
            }

            if ($result == null) {
                return (array('status' => '300'));
            } else {
                return (array('status' => '350', 'result' => $result));

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function update_course($id)
    {

        if ($this->data['type'] == 'public' or $this->data['type'] == 'basic' or
            $this->data['type'] == 'prime' or $this->data['type'] == 'professional'

        ) {
            $type = $this->data['type'];
        } else {
            return (array('status' => '400', 'message' => 'سیستم در انتخاب نوع  درس دچار مشکل شده لطفا این مورد را به واحد فنی گزارش دهید.'));
        }
        if ($this->data['presentation'] == 'theoretic' or $this->data['presentation'] == 'practical') {
            $presentation = $this->data['presentation'];
        } else {
            return (array('status' => '400', 'message' => 'سیستم در انتخاب نوع ارئه درس دچار مشکل شده لطفا این مورد را به واحد فنی گزارش دهید.'));
        }
        if ($this->data['status_prerequisite'] == 'yes' or $this->data['status_prerequisite'] == 'no') {
            $status_prerequisite = $this->data['status_prerequisite'];
        } else {
            return (array('status' => '400', 'message' => 'سیستم در حالت پیش نیازی دچار مشکل شده لطفا این مورد را به واحد فنی گزارش دهید.'));
        }

        if ($this->data['prerequisite'] == null) {
            $list_prerequisite = null;
        } else {
            $list_prerequisite = implode(',', $this->data['prerequisite']);
        }
        try {
            DB::table('course')->where('id', $id)->update(
                ['name' => $this->data['name'],
                    'presentation' => $presentation, 'type' => $type,
                    'unit_number' => $this->data['unit_number'], 'price' => $this->data['price'],
                    'status_prerequisite' => $status_prerequisite, 'list_prerequisite' => $list_prerequisite
                ]
            );
            if ($this->data['status_prerequisite'] == 'no') {
                $del_pre = $this->delete_prerequisite_course($this->data['name']);
                if ($del_pre['status'] == '400') {
                    return (array('status' => '400', 'message' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }
            }
            return (array('status' => '350', 'name_course' => $this->data['name']));

        } catch (Exception $e) {
            return (array('status' => '400', 'message' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
        }
    }

    public function delete_prerequisite_course($name)
    {
        try {
            $check = DB::table('course')->select('id', 'list_prerequisite')->get();
            foreach ($check as $one_check) {
                if ($one_check->list_prerequisite == null) {
                } else {
                    $list_prerequisite = explode(',', $one_check->list_prerequisite);
                    $status_search = array_search($name, $list_prerequisite);
                    if ($status_search === false) {
                    } else {
                        unset($list_prerequisite[$status_search]);
                        $list_prerequisite = implode(',', $list_prerequisite);
                        if ($list_prerequisite == '') {
                            $list_prerequisite = null;
                        }
                        try {
                            DB::table('course')->where('id', $one_check->id)->update(
                                [
                                    'list_prerequisite' => $list_prerequisite
                                ]
                            );
                        } catch (Exception $e) {
                            return (array('status' => '400'));
                        }
                    }
                }
            }
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }
}