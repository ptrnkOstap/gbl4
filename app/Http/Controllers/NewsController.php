<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->with('category')
            ->get();
        return view('showAll', ['news' => $news]);
    }

    public function showSingle(News $news)
    {
//        dd($news);
        return view('showSingle', ['news' => $news]);
    }
}
