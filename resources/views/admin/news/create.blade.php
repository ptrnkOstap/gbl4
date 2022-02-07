@extends('layouts.admin')
@section('content')
    <form method="post" action="{{route('admin.news.store')}}">
        @csrf
        <label for="categories">News category</label>
        <div class="form-group">
            <select class="form-select-sm" name="categories[]" id="categories">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="is_visible">Is visible:</label><br>
            <select class="form-select-sm" id="is_visible" name="is_visible">

                <option @if(old('is_private')===1) selected @endif value="1">Active</option>
                <option @if(old('is_private')===0) selected @endif value="0">Blocked</option>
            </select>
        </div>
        <label for="news_title">News title:</label>
        <input type="text" class="form-control" id="news_title" name="news_title" value="{{old('title')}}">

        <label for="news_content">News content</label>
        <textarea name="news_content" class="form-control" id="news_content" cols="30"
                  rows="10">{!! old('inform') !!}</textarea>
        <br>
        <input type="submit" class="btn btn-success">
    </form>
@endsection

