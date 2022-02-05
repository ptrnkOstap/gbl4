@extends('layouts.admin')
@section('content')
    <form method="post" action="{{ route('admin.update', ['news' => $news]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="categories">Выбрать категории</label>

            <select class="form-control" name="categories[]" id="categories"  multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @if(in_array($category->id, $selectCategories)) selected @endif
                    >{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
            @error('title') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" id="author" name="author"  value="{{ $news->author }}">
            @error('author') <strong style="color:red;">{{ $message }}</strong>  @enderror
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select name="status" id="status" class="form-control">
                <option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Описание</label>
            <textarea class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float:right;">Сохранить</button>
    </form>
@endsection
