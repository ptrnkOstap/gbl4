<?php

namespace App\Services;

use App\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Laravie\Parser\Document as BaseDocument;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParsingService implements Parser
{

    protected BaseDocument $load;

    private array $rssLinks = [
        'https://news.yandex.ru/auto.rss',
        'https://news.yandex.ru/auto_racing.rss',
        'https://news.yandex.ru/army.rss',
        'https://news.yandex.ru/gadgets.rss',
        'https://news.yandex.ru/index.rss',
        'https://news.yandex.ru/martial_arts.rss',
        'https://news.yandex.ru/communal.rss',
        'https://news.yandex.ru/health.rss',
        'https://news.yandex.ru/games.rss',
        'https://news.yandex.ru/internet.rss',
        'https://news.yandex.ru/cyber_sport.rss',
        'https://news.yandex.ru/movies.rss',
        'https://news.yandex.ru/cosmos.rss',
        'https://news.yandex.ru/culture.rss',
//        'https://news.yandex.ru/fire.rss',
        'https://news.yandex.ru/championsleague.rss',
        'https://news.yandex.ru/music.rss',
        'https://news.yandex.ru/nhl.rss',
    ];

    public function loadAll(): array
    {
        $results = [];
        foreach ($this->rssLinks as $link) {

            $results[] = $this->load($link)->start();
        }
//        dd($results);
        return $results;
    }

    public function load(string $url): Parser
    {
        $this->load = XmlParser::load($url);
        return $this;
    }

    public function start(): array
    {
        return $this->load->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);


    }
}
