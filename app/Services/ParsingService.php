<?php

namespace App\Services;

use App\Contracts\Parser;
use Laravie\Parser\Document as BaseDocument;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParsingService implements Parser
{

    protected BaseDocument $load;

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
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
    }
}
