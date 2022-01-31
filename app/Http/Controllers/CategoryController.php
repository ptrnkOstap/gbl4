<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category_id)
    {
        $filtered = array_filter($this->news, function ($val) use ($category_id) {
            return $val['category_id'] === +$category_id;
        });
//        dd($filtered);
        return view('showCategory', ['filtered' => $filtered]);
    }

    public function listCategories()
    {
        return view('displayCategories', ['categories' => $this->categories]);
    }
}
