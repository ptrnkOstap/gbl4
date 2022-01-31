<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_categories')->insert($this->getData());
    }

    private function getData()
    {
        $categories = [
            ['category' => 'sport'],
            ['category' => 'science'],
            ['category' => 'music'],
            ['category' => 'travel'],
            ['category' => 'universe'],
            ['category' => 'people'],
            ['category' => 'joy']
        ];
        return $categories;
    }
}
