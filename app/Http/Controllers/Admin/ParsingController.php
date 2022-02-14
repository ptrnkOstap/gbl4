<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;


class ParsingController extends Controller
{
    public function __invoke()
    {
        dd(app(Parser::class)->load('https://news.yandex.ru/music.rss')->start());
    }
}
