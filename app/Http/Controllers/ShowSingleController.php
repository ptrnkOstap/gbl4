<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowSingleController extends Controller
{
    public function index($newsId)
    {
        $filtered = array_filter($this->news, function ($val) use ($newsId) {
            return $val[3] == $newsId;
        });
        $newsItem = array_pop($filtered);

//        dd($newsItem);
        return view('showSingle', ['newsItem' => $newsItem]);
    }
}
