<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsDetailsController extends Controller
{
    public function get(){
        return view('user.news_details');

    }
}
