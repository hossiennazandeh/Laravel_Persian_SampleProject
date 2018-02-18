<?php

namespace App\Http\Middleware;

use App\Classes\driver\ManagementLoginAdmin;
use Closure;

class LoginAdmin
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
        if ($request->session()->exists('login_admin')) {
            $manage = new ManagementLoginAdmin();
            $username = $request->session()->get('login_admin');
            $check_set = $manage->check_username($username);
            if ($check_set['status'] == '350'){
                $request->session()->put('admin_url',$url);
                return $next($request);
            }elseif ($check_set['status'] == '300'){
                //page hacker
            }else{
                //page moshkele fani
            }
        } else {
            $request->session()->put('admin_url',$url);
            return redirect()->route('login');
        }

    }
}
