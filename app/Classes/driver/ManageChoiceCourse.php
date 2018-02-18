<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 29/07/2017
 * Time: 11:32
 */

namespace app\Classes\driver;


use Illuminate\Support\Facades\DB;

class ManageChoiceCourse
{
    private function check_choice($id_student, $list_choice)
    {
        try {
            $check = DB::table('choice_course')->where('Student_student_number', $id_student)->get();
            if ($check->isEmpty()) {
                return (array('status' => '350'));
            } else {
                foreach ($list_choice as $one_choice) {
                    $check = DB::table('choice_course')->where('Student_student_number', $id_student)->where('Group_Course_code_course', $one_choice)->get();
                    if ($check->isEmpty()) {

                    } else {
                        return (array('status' => '300', 'course_id' => $one_choice));
                    }
                }
                return (array('status' => '350'));
            }
        } catch (Exception $e) {
            return (array('status' => '400'));

        }

    }

    public function insert_choice_course($id_student, $list_choice, $semester, $status_price)
    {

        $check = $this->check_choice($id_student, $list_choice);
        if ($check['status'] == '350') {
            try {
                if ($status_price == 'paid') {
                    $status_price = 'yes';
                } else {
                    $status_price = 'no';
                }
                foreach ($list_choice as $one_choice) {
                    $item = substr($one_choice, 0, strlen($one_choice) - 1);
                    DB::table('choice_course')->insert(
                        [
                            'status' => 'non_accept',
                            'Student_student_number' => $id_student,
                            'semeter' => $semester,
                            'Group_Course_code_course' => $one_choice,
                            'status_pay' =>$status_price
                        ]
                    );
                }
                return (array('status' => '350'));
            } catch (Exception $e) {
                return (array('status' => '400'));

            }
        } elseif ($check['status'] == '300') {
            return (array('status' => '300', 'course_id' => $check['course_id']));
        } else {
            return (array('status' => '400'));
        }

    }

    public function get_choice($id_student)
    {
        try {
            $choice = DB::table('choice_course')
                ->join('group_course', 'choice_course.Group_Course_code_course', '=', 'group_course.code_course')
                ->join('course', 'course.id', '=', 'group_course.Course_id')
                ->select('choice_course.*', 'course.name')->where('choice_course.Student_student_number', '=', $id_student)
                ->get();
            if ($choice->isEmpty()) {
                return (array('status' => '300'));
            } else {
                return (array('status' => '350', 'choice' => $choice));

            }
        } catch (Exception $e) {
            return (array('status' => '400'));

        }
    }

    public function select_choice_course($id)
    {
        try {
            $choice = DB::table('choice_course')->where('id', $id)->get();
            if ($choice->isEmpty()) {
                return (array('status' => '300'));
            } else {
                return (array('status' => '350', 'choice' => $choice));
            }
        } catch (Exception $e) {
            return (array('status' => '400'));

        }
    }

    public function delete_choice_course($id)
    {
        try {
            $del = DB::table('choice_course')->where('id', $id)->delete();
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