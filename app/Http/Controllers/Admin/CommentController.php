<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Composer\Command\SearchCommand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function get()
    {
        $comments= Comment::paginate(10);
        return view('admin.comment', ['comments' => $comments, 'active' => 'comment']);

    }
    public function destroy(Request $request, Comment $comment)
    {  if ($request->ajax()) {


        $comment->delete();
        return ['status' => true];
    }
    }

    public function post(Request $request)
    {
        if ($request->ajax()) {
            $comments = DB::table('comments')->where('name', 'like', '%'.$request->search.'%')
                ->orWhere('email', 'like', '%'.$request->search.'%')
                ->orWhere('subject', 'like', '%'.$request->search.'%')
                ->orWhere('message', 'like', '%'.$request->search.'%')
                ->get();
            return ['status' => true, 'comments' => $comments];

/*            $status = $request->input('status');
            if ($status == 'search') {
                $item = $request->input('item');
                $manage = new SearchCommand();
                $search = $manage->search($item);
                if ($search['status'] == '350') {
                    return response()->json(array('status' => true,
                        'data' => $search['search']));
                } else if ($search['status'] == '300') {
                    return response()->json(array('status' => false));
                } else {
                    return response()->json(array('status' => false, 'msg' => 'خطایی در سیستم رخ داده است لطفا هر چه سریعتر این موضوع را به بخش فنی گزارش دهید.'));
                }
            }*/
        }
    }

}
