<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class ShowSingleController extends Controller
{
    public function index(News $news)  //$newsId
    {
//        dd($news);
//        $filtered = array_filter($this->news, function ($val) use ($newsId) {
//
//            return $val['id'] === (int)$newsId;
//        });
//        $newsItem = array_pop($filtered);

//        dd($newsItem);
        return view('showSingle', ['news' => $news]);
    }
}
