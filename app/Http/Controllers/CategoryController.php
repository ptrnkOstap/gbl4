<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category_id)
    {

        $filtered = $this->news->get()->where('category_id', '=', $category_id);
//        $filtered = array_filter($this->news, function ($val) use ($category_id) {
//            return $val['category_id'] === +$category_id;
//        });
//        dd($filtered);
        return view('showCategory', ['filtered' => $filtered]);
    }

    public function listCategories()
    {
        $categories = Categories::all();
        return view('displayCategories', ['categories' => $categories]);
    }
}
