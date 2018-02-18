<?php

namespace App\Http\Middleware;

use App\Classes\driver\ManagementLoginStudent;
use Closure;

class LoginStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = $request->url();
        if ($request->session()->exists('login_student')) {
            $manage = new ManagementLoginStudent();
            $username = $request->session()->get('login_student');
            $check_set = $manage->check_username($username);
            if ($check_set['status'] == '350') {
                $request->session()->put('student_url',$url);
                return $next($request);
            } elseif ($check_set['status'] == '300') {
                //page hacker
            } else {
                //page moshkele fani
            }
        } else {
            $request->session()->put('student_url', $url);
            return redirect()->route('login_student');
        }

    }
}
