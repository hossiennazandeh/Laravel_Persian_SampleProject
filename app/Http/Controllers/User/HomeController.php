<?php

namespace App\Http\Controllers\User;

use App\Classes\driver\ManagementCourseAvailable;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\driver\News;
use App\Classes\Mails;

class HomeController extends Controller
{
    public function get()
    {
        $news = new  News();
        $professor = new ManagementCourseAvailable();
        $data_professor = $professor->get_all_professor();
        $data = $news->get_all_limit(5);
        if ($data['status'] == '350' and $data_professor['status'] == '350') {
            return view('user.index', ['news' => $data['news'], 'list_professor' =>$data_professor['list_professor']]);
        } elseif ($data['status'] == '300') {
            return view('user.index', ['news' => false]);
        } else {
            return view('user.index', ['news' => false]);
        }

    }

    public function post(Request $request)
    {

        $commet=new Comment();//initialize comment 
        $commet->name=$request->name;
        $commet->email=$request->email;
        $commet->subject=$request->subject;
        $commet->message=$request->message;
        $commet->save(); //save to DB
        return view('user.accept'); //return view

    }

    public function comment()
    {
        return view('user.comment');
    }

}
