@extends('layouts.admin')
@section('content')
    <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="categories">Category</label>

            <select class="form-control" name="categories[]" id="categories">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @if(in_array($category->id, $selectCategories)) selected @endif
                    >{{ $category->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="news_title">News title</label>
            <input type="text" class="form-control" id="news_title" name="news_title" value="{{ $news->title }}">
            @error('news_title') <strong style="color:red;">{{ $message }}</strong> @enderror
        </div>
        {{--        <div class="form-group">--}}
        {{--            <label for="author">Автор</label>--}}
        {{--            <input type="text" class="form-control" id="author" name="author"  value="{{ $news->author }}">--}}
        {{--            @error('author') <strong style="color:red;">{{ $message }}</strong>  @enderror--}}
        {{--        </div>--}}
        <div class="form-group">
            <label for="is_visible">Is visible</label>
            <select name="is_visible" id="is_visible" class="form-control">
                <option @if($news->is_vivisble === 1) selected @endif value=1>ACTIVE</option>
                <option @if($news->is_visible === 0) selected @endif value=0>BLOCKED</option>
            </select>
        </div>
        <div class="form-group">
            <label for="news_content">News content</label>
            <textarea class="form-control" name="news_content" id="news_content">{!! $news->inform !!}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float:right;">update</button>
    </form>
@endsection
