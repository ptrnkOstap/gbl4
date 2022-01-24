<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function Index()
    {
        $randomNewsEntries = [];
        $newsNum = count($this->news) - 1;

        for ($i = 0; $i < 6; $i++) {
            $randomEntries[] = $this->news[(int)rand(0, $newsNum)];
        }
//        dd($this->news);
        return view('WelcomeView', ['news' => $randomEntries, 'categories' => $this->categories]);
    }
}
