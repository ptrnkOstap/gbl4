<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function Index()
    {
        $randomNewsEntries = [];

        $newsList = News::query()->with('Category')->get();
        $newsNum = $newsList->count()-1;

        for ($i = 0; $i < 6; $i++) {
//            dd(News::with('news_categories')->limit(6));
            $randomEntries[] = $newsList[(int)rand(0, $newsNum)];
//            $randomEntries[] = News::with('news_categories');
        }
//        dd($this->news);
        return view('WelcomeView', ['news' => $randomEntries]);
    }
}
