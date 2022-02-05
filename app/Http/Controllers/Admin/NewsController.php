<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $news = News::query()->get();
//        $news = json_decode($res, true);

        $news = News::query()->with('category');
//        dd($this->news->paginate(13));
        return view('admin.news.index', ['news' => $news->paginate(13)]);
//        return view('admin.index', ['news' => $this->news->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('admin.news.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->only(['is_visible', 'news_title', 'news_content', 'categories']);
        $newsEntry = new News;

        $newsEntry->title = $params['news_title'];
        $newsEntry->inform = $params['news_content'];
        $newsEntry->is_private = +$params['is_visible'];
        $newsEntry->category_id = +array_pop($params['categories']);

        $newsEntry->save();

        return redirect()->
        route('admin.news.index')->
        with('newsCreated', 'A news entry has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        // Добрый день, у меня проблемы с редактированием существующей записи.
        // если раскомментить ссылку на редакктирование, то получаю эту ошибку -
        // Route [admin.edit] not defined. (View: /var/www/html/resources/views/admin/news/index.blade.php)

        // не подскажете в чем дело?

        return view('admin.news.edit', ['news' => $news]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->only(['is_visible', 'news_title', 'news_content', 'categories']);

        $newsEntry = new News;

        $newsEntry->title = $params['news_title'];
        $newsEntry->inform = $params['news_content'];
        $newsEntry->is_private = +$params['is_visible'];
        $newsEntry->category_id = +array_pop($params['categories']);

        $newsEntry->save();

        return redirect()->
        route('admin.index')->
        with('newsCreated', 'A news entry has been created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
