<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\Categories;
use App\Models\News;
use App\Services\UploadService;
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
     * @param CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
//        $params = $request->only(['is_visible', 'news_title', 'news_content', 'categories']);
        $params = $request->validated();

        $newsEntry = new News;

        $newsEntry->title = $params['news_title'];
        $newsEntry->inform = $params['news_content'];
        $newsEntry->is_private = +$params['is_visible'];
        $newsEntry->category_id = $params['categories'];

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

        $categories = Categories::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'selectedCategory' => $news->category_id]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, News $news)
    {
        $params = $request->validated();

        $newsEntry = News::find($news->id);
        $newsEntry->title = $params['news_title'];
        $newsEntry->inform = $params['news_content'];

        if ($request->hasFile('image')) {
            $newsEntry->image = app(UploadService::class)->loadFile($request->file('image'));
        }
        $newsEntry->is_private = +$params['is_visible'];
        $newsEntry->category_id = $params['categories'];

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
