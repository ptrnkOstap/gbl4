<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category)
    {
        $filtered = array_filter($this->news, function ($val) use ($category) {
            return $val[1] === $category;
        });
//        dd($filtered);
        return view('showCategory', ['filtered' => $filtered]);
    }

    public function listCategories()
    {
        return view('displayCategories', ['categories' => $this->categories]);
    }
}
