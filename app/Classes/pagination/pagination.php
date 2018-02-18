<?php
/**
 * Created by PhpStorm.
 * User: Mahdi
 * Date: 09/06/2017
 * Time: 05:48 PM
 */

namespace app\Classes\pagination;

use Exception;
use Illuminate\Support\Facades\DB;

class pagination
{
    private $table;
    private $skip;
    private $take;


    function __construct($table, $skip, $take)
    {
        $this->table = $table;
        $this->skip = $skip;
        $this->take = $take;

    }

    public function paginate($order_by,$name_condition = null, $condition = null)
    {
        if ($condition == null and $name_condition == null) {
            try {
                $table_data = DB::select("select * from $this->table order by $order_by desc limit ?,?", [$this->take * ($this->skip - 1), $this->take]);


                $table_count = DB::table($this->table)->count();
                $list_news = [];
                foreach ($table_data as $one_news) {
                    array_push($list_news, $one_news);
                }
                if ($list_news == [] or $table_count == 0) {
                    return (array('status' => '300'));
                } else {
                    $div = $table_count / $this->take;
                    if ($div == floor($div)) {
                        $table_count = floor($div);
                    } else {
                        $table_count = floor($div) + 1;
                    }
                    return (array('status' => '350', 'data' => $list_news, 'count' => $table_count));
                }

            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        } else {
            try {
                $table_data = DB::select("select * from $this->table where $name_condition = ? order by $order_by desc limit ?,?", [$condition, $this->take * ($this->skip - 1), $this->take]);

                $table_count = DB::table($this->table)->where($name_condition, $condition)->count();
                $list_data = [];
                foreach ($table_data as $one_data) {
                    array_push($list_data, $one_data);
                }
                if ($list_data == [] or $table_count == 0) {
                    return (array('status' => '300'));
                } else {
                    $div = $table_count / $this->take;
                    if ($div == floor($div)) {
                        $table_count = floor($div);
                    } else {
                        $table_count = floor($div) + 1;
                    }
                    return (array('status' => '350', 'data' => $list_data, 'count' => $table_count));
                }

            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        }


    }

}