<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $categories = [
        1 => 'Nature',
        2 => 'Sport',
        3 => 'Music',
        4 => 'Breaking',
        5 => 'Cars',
        6 => 'Hobby',
        7 => 'Universe'
    ];
    protected array $news = [];

    public function __construct()
    {

        if (isEmpty($this->news)) {
            $this->newsInit();
        }
    }

    private function categoriesInit(): void
    {
        $faker = Factory::create();
        for ($catId = 1; $catId <= 7; $catId++) {
            $this->categories[$catId] = $faker->word();
        }
    }

    private function newsInit()
    {
        $faker = Factory::create();
        $newsId = 1;
        foreach ($this->categories as $category) {
            for ($i = 0; $i < 5; $i++) {
                $this->news[] = [
                    $faker->paragraph(3),
                    $category,
                    implode(" ", $faker->words((int)rand(1, 4))),
                    $newsId
                ];
                $newsId++;
            }
        }
    }
}
