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
        //заработало :) надо было просто поиграть минут 40 и перезапустить проект

        // не подскажете в чем дело?
        $categories = Categories::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'selectCategories' => [$news->category_id]]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
//        $newsEntry = News::query()->with('category')->select()->where('id', '=', $news->id)->get();
        $newsEntry = News::find($news->id);
//        dd($newsEntry);
        $params = $request->only(['is_visible', 'news_title', 'news_content', 'categories']);
//        dd($params);
        $newsEntry->title = $params['news_title'];
        $newsEntry->inform = $params['news_content'];
        $newsEntry->is_private = +$params['is_visible'];
        $newsEntry->category_id = +array_pop($params['categories']);

        if ($newsEntry->save()) {
            return redirect()->
            route('admin.news.index')->
            with('newsUpdate', 'ok');
        };

        return redirect()->
        route('admin.news.index')->
        with('newsCreated', 'error');
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
