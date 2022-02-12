<?php

namespace App\Http\Controllers;

use App\Models\News;
use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $news;
//    protected array $categories = [
//        1 => 'Nature',
//        2 => 'Sport',
//        3 => 'Music',
//        4 => 'Breaking',
//        5 => 'Cars',
//        6 => 'Hobby',
//        7 => 'Universe'
//    ];
//    protected array $news = [];

    public function __construct()
    {
        if (isEmpty($this->news)) {
            $this->news = News::query()->with('category');;
        }
    }

//    private function categoriesInit(): void
//    {
//        $faker = Factory::create();
//        for ($catId = 1; $catId <= 7; $catId++) {
//            $this->categories[$catId] = $faker->word();
//        }
//    }
//
//    private function newsInit()
//    {
//        $res = json_encode(DB::
//        select('SELECT
//                       news.inform,
//                       news.is_private,
//                       news.title,
//                       news.id as id,
//                       news.created_at,
//                       news.updated_at,
//                        news.category_id as category_id,
//                       nc.category
//                    FROM gbl4.news
//                    inner join news_categories nc on news.category_id = nc.id
//                    '));
//
//        $this->news = json_decode($res, true);
////        dd($this->news);
////        $faker = Factory::create();
////        $newsId = 1;
////        foreach ($this->categories as $category) {
////            for ($i = 0; $i < 5; $i++) {
////                $this->news[] = [
////                    $faker->paragraph(3),
////                    $category,
////                    implode(" ", $faker->words((int)rand(1, 4))),
////                    $newsId
////                ];
////                $newsId++;
////            }
////        }
//
//    }
}
