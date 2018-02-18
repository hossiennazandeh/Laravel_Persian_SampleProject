<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 02/07/2017
 * Time: 00:10
 */

namespace app\Classes\driver;


use Illuminate\Support\Facades\DB;

class ManagementCourseAvailable
{
    private $data;

    function __construct($data = null)
    {
        $this->data = $data;

    }

    public function get_all_semester()
    {
        $list_semester = [];
        try {
            $semester = DB::table('student')->orderBy('student_number', 'desc')->select('entry_semester')->get();
            if ($semester->isEmpty()) {
                return (array('status' => '300'));
            } else {
                foreach ($semester as $one_semester) {
                    if (array_search($one_semester->entry_semester, $list_semester) === false) {
                        array_push($list_semester, $one_semester->entry_semester);
                    } else {

                    }
                }
                return (array('status' => '350', 'list_semester' => $list_semester));

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function get_all_professor()
    {
        $list_professor = [];
        try {
            $professor = DB::table('professor')->orderBy('id', 'desc')->select('id', 'firstname', 'lastname', 'img')->get();
            if ($professor->isEmpty()) {
                return (array('status' => '300'));
            } else {
                foreach ($professor as $one_professor) {
                    if ($one_professor->img != null) {
                        $one_professor->img = "media/professor/" . $one_professor->img;
                    }
                    array_push($list_professor, array('all_name' => $one_professor->firstname . " " . $one_professor->lastname, 'id' => $one_professor->id, 'img' => $one_professor->img));
                }
                return (array('status' => '350', 'list_professor' => $list_professor));

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function get_all_course()
    {
        $list_course = [];
        try {
            $course = DB::table('course')->orderBy('id', 'desc')->select('id', 'name', 'unit_number')->get();
            if ($course->isEmpty()) {
                return (array('status' => '300'));
            } else {
                foreach ($course as $one_course) {
                    array_push($list_course, array('name' => $one_course->name, 'id' => $one_course->id, 'unit_number' => $one_course->unit_number));
                }
                return (array('status' => '350', 'list_course' => $list_course));

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function get_all_class()
    {
        $list_class = [];
        try {
            $course = DB::table('class')->orderBy('id', 'desc')->select('id', 'number')->get();
            if ($course->isEmpty()) {
                return (array('status' => '300'));
            } else {
                foreach ($course as $one_course) {
                    array_push($list_class, array('number' => $one_course->number, 'id' => $one_course->id));
                }
                return (array('status' => '350', 'list_class' => $list_class));

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function check_date_class($day = null, $class = null)
    {
        $list_all_time = [];
        try {
            $time = DB::table('time_course')->get();
            if ($time->isEmpty()) {
                return (array('status' => '300'));
            } else {
                foreach ($time as $one_time) {
                    $days = explode(',', $one_time->days);
                    $classes = explode(',', $one_time->classes);
                    $search_day = array_search($day, $days);
                    $search_cls = array_search($class, $classes);
                    if ($search_day === false or $search_cls === false) {

                    } elseif ($search_cls == $search_day) {
                        $time_class = explode(',', $one_time->time);
                        array_push($list_all_time, $time_class[$search_day]);
                    }
                }
            }
            sort($list_all_time);
            return (array('status' => '350', 'list_time' => $list_all_time));
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function fallBack_exam($id)
    {
        try {
            $get_exam = DB::table('group_course')->select('date_exam','time_exam')->where('Course_id', (int)$id)->get();
            $get_date_exam = $get_exam[0]->date_exam;
            $get_time_exam = $get_exam[0]->time_exam;
            if ($get_date_exam == null or $get_time_exam == null) {
                return (array('status' => '300'));
            } else {
                return (array('status' => '350', 'date_exam' => $get_date_exam,'time_exam'=>$get_time_exam));
            }
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    private function check_course_set($id_course, $group)
    {
        try {
            $course = DB::table('group_course')->where('Course_id', $id_course)->where('group_number', $group)->get();
            if ($course->isEmpty()) {
                return (array('status' => '350'));
            } else {
                return (array('status' => '300'));

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }

    }

    public function check_course($id)
    {
        try {
            $course = DB::table('group_course')->where('code_course', $id)->get();
            if ($course->isEmpty()) {
                return (array('status' => '300'));
            } else {
                return (array('status' => '350'));
            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }

    }

    public function insert_course_group()
    {
        $check = $this->check_course_set($this->data['id_course'], $this->data['group']);
        if ($check['status'] == '350') {
            $list_days = implode(',', json_decode($this->data['list_day']));
            $list_time = implode(',', json_decode($this->data['list_time']));
            $list_classes = implode(',', json_decode($this->data['list_classes']));
            $id_group_course = $this->data['id_course'] . $this->data['group'];
            try {
                $insert_time = DB::table('time_course')->insertGetId([
                    'days' => $list_days,
                    'time' => $list_time,
                    'classes' => $list_classes,
                    'rotatory' => $this->data['checked_day']
                ]);
                DB::table('group_course')->insert(
                    [
                        'code_course' => $id_group_course,
                        'group_number' => $this->data['group'],
                        'semester' => $this->data['semester'],
                        'capacity' => $this->data['capacity'],
                        'min_capacity' => $this->data['min_capacity'],
                        'Course_id' => $this->data['id_course'],
                        'professor_id' => $this->data['id_professor'],
                        'Time_Course_id' => $insert_time,
                        'guest_semester' => $this->data['list_guest'],
                        'term' => $this->data['term_now'],
                        'date_exam' => $this->data['date_exam'],
                        'time_exam' => $this->data['time_exam']
                    ]
                );
                return (array('status' => '350'));

            } catch (Exception $e) {
                return (array('status' => '400', 'message' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
            }
        } elseif ($check['status'] == '300') {
            return array('status' => '300', 'msg' => 'این درس با گروه درسی وارده قبلا ثبت گردیده است');
        } else {
            return (array('status' => '400', 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
        }

    }

    public function delete_course($id)
    {
        try {
            $select_time_course = DB::table('group_course')->select('Time_Course_id')->where('code_course', $id)->first();
            $del = DB::table('group_course')->where('code_course', $id)->delete();
            if ($del == 1) {
                $delete_time_course = DB::table('time_course')->where('id', $select_time_course->Time_Course_id)->delete();
                if ($delete_time_course == 1) {
                    return (array('status' => '350'));
                } else {
                    return (array('status' => '300'));
                }
            } else {
                return (array('status' => '300'));
            }
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function select_available_course($id)
    {
        try {
            $course = DB::table('group_course')->where('code_course', $id)->first();
            if ($course == null) {
                return (array('status' => '300'));
            } else {
                return (array('status' => '350', 'course' => $course));
            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function select_time_course($id)
    {
        try {
            $time_course = DB::table('time_course')->where('id', $id)->first();
            if ($time_course == null) {
                return (array('status' => '300'));
            } else {
                $days = explode(',', $time_course->days);
                $time = explode(',', $time_course->time);
                $classes = explode(',', $time_course->classes);
                $rotatory = $time_course->rotatory;
                return (array('status' => '350', 'days' => $days, 'classes' => $classes, 'time' => $time, 'rotatory' => $rotatory));
            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function get_all_group_course()
    {
        $list_course = [];
        try {
            $course = DB::table('group_course')->join('course', 'group_course.Course_id', '=', 'course.id')->orderBy('group_course.code_course', 'desc')
                ->select('group_course.code_course', 'course.id', 'group_course.group_number', 'course.name', 'course.type', 'course.unit_number', 'course.price')->get();
            if ($course->isEmpty()) {
                return (array('status' => '300'));
            } else {
                foreach ($course as $one_course) {
                    array_push($list_course, array('code_course' => $one_course->code_course, 'course_id' => $one_course->id,
                        'group_number' => $one_course->group_number, 'name_course' => $one_course->name,
                        'type_course' => $one_course->type, 'unit_number' => $one_course->unit_number, 'price' => $one_course->price));
                }
                return (array('status' => '350', 'list_course' => $list_course));

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function get_course_available_by_professor($id_professor)
    {
        $list_course = [];
        try {
            $course = DB::table('group_course')->join('course', 'group_course.Course_id', '=', 'course.id')->orderBy('group_course.code_course', 'desc')
                ->where('group_course.professor_id', '=', $id_professor)->select('group_course.semester', 'group_course.group_number', 'course.name')->get();
            if ($course->isEmpty()) {
                return (array('status' => '300'));
            } else {
                foreach ($course as $one_course) {
                    array_push($list_course, array('group_number' => $one_course->group_number, 'name_course' => $one_course->name, 'semester' => $one_course->semester));
                }
                return (array('status' => '350', 'list_course' => $list_course));

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function get_all_course_available()
    {
        $list_course = [];
        try {
            $course = DB::table('group_course')->join('course', 'group_course.Course_id', '=', 'course.id')->join('professor', 'group_course.professor_id', '=', 'professor.id')->orderBy('group_course.code_course', 'desc')
                ->select('group_course.group_number', 'group_course.code_course', 'course.name', 'course.unit_number', 'group_course.capacity', 'professor.firstname', 'professor.lastname')->get();
            if ($course->isEmpty()) {
                return (array('status' => '300'));
            } else {
                foreach ($course as $one_course) {
                    try {
                        $count = DB::table('choice_course')->where('Group_Course_code_course', $one_course->code_course)->count();
                        array_push($list_course, array('count_have_course' => $count, 'group_number' => $one_course->group_number, 'name_course' => $one_course->name, 'unit_number' => $one_course->unit_number, 'capacity' => $one_course->capacity, 'firstname' => $one_course->firstname, 'lastname' => $one_course->lastname));

                    } catch (Exception $e) {
                        return (array('status' => '400'));
                    }
                }
                return (array('status' => '350', 'list_course' => $list_course));

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }
}