<?php

namespace App\Classes\driver;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Classes\date\Custom_date;

class News
{
    private $title;
    private $abstract;
    private $body;

    function __construct($title = null, $abstract = null, $body = null)
    {
        $this->title = $title;
        $this->abstract = $abstract;
        $this->body = $body;


    }

    public function count_news()
    {
        try {
            $count = DB::table('news')->count();
            return (array('status' => '350', 'count_news' => $count));
        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function check_News()
    {
        try {
            $check = DB::table('news')->where('title', $this->title)
                ->orwhere('abstract', $this->abstract)->orwhere('body', $this->body)->get();
            if ($check->isEmpty()) {
                return (array('status' => '350'));
            } else {
                return (array('status' => '300'));

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }

    }

    public function check_update_News($id)
    {
        try {
            $check = DB::table('news')->whereNotIn('id', [$id])->get();
            if ($check->isEmpty()) {
                return (array('status' => '350'));
            } else {
                foreach ($check as $item) {
                    if ($item->abstract == $this->abstract or $item->body == $this->body or $item->title == $this->title) {
                        return (array('status' => '300'));
                    } else {
                        return (array('status' => '350'));
                    }
                }


            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }

    }

    public function check_News_id($id)
    {
        try {
            $check = DB::table('news')->where('id', $id)->get();
            if ($check->isEmpty()) {
                return (array('status' => '350'));
            } else {
                return (array('status' => '300'));

            }

        } catch (Exception $e) {
            return (array('status' => '400'));
        }
    }

    public function insert_News($img)
    {
        try {
            $today_time = new Custom_date();
            DB::table('news')->insert(
                ['title' => $this->title, 'abstract' => $this->abstract,
                    'body' => $this->body, 'publish_date' => $today_time->today_time(), 'like_count' => 0, 'img' => $img]
            );
            return (array('status' => '350', 'publish_date' => $today_time->today_time(), 'name_news' => $this->title));

        } catch (Exception $e) {
            return (array('status' => '400'));
        }


    }

    public function select_News()
    {
        $check = $this->check_News();
        if ($check['status'] == '300') {
            try {
                $select = DB::table('news')->where('title', $this->title)->get();
                $select = $select[0];
                if ($select->img != null) {
                    $select->img = "media/news/" . $select->img;
                }
                return (array('status' => '350', 'news' => $select));
            } catch (Exception $e) {
                return (array('status' => '400'));

            }
        } elseif ($check['status'] == '350') {
            return (array('status' => '300'));
        }

    }

    public function select_News_id($id)
    {
        $check = $this->check_News_id($id);
        if ($check['status'] == '300') {
            try {
                $select = DB::table('news')->where('id', $id)->get();
                $select = $select[0];
                if ($select->img != null) {
                    $select->img = "media/news/" . $select->img;
                }
                return (array('status' => '350', 'news' => $select));
            } catch (Exception $e) {
                return (array('status' => '400'));

            }

        } elseif ($check['status'] == '350') {
            return (array('status' => '300'));
        }


    }

    public function get_all_limit($number)
    {
        try {
            $select = DB::table('news')->limit($number)->get();

            foreach ($select as $one_select) {
                if ($one_select->img != null) {
                    $one_select->img = "media/news/" . $one_select->img;
                }
            }
            return (array('status' => '350', 'news' => $select));
        } catch (Exception $e) {
            return (array('status' => '400'));

        }
    }

    public function update_News($id, $img)
    {
        if ($img == null) {
            try {
                DB::table('news')
                    ->where('id', $id)
                    ->update(['title' => $this->title, 'abstract' => $this->abstract, 'body' => $this->body]);
                return (array('status' => '350'));

            } catch (Exception $e) {
                return (array('status' => '400'));
            }
        } else {
            try {
                DB::table('news')
                    ->where('id', $id)
                    ->update(['title' => $this->title, 'abstract' => $this->abstract, 'body' => $this->body, 'img' => $img]);
                return (array('status' => '350'));

            } catch (Exception $e) {
                return (array('status' => '400'));
            }

        }
    }

    public function delete_News($title, $id)
    {
        try {
            $del = DB::table('news')->where('title', $title)->where('id', $id)->delete();
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