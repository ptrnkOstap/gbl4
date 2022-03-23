@extends('layouts.admin')

@section('content')
    <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="categories">Category</label>

            <select class="form-control" name="categories" id="categories">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @if($category->id === $selectedCategory) selected @endif
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
            <label for="image">Upload an image:</label><br>
{{--            {{Illuminate\Support\Facades\Storage::disk('public')->url($news->image)}}--}}
            <img src="{{Illuminate\Support\Facades\Storage::disk('public')->url($news->image)}}" alt="pic"
                 style="width: 200px;height: 200px;">
            {{--            {{\Illuminate\Support\Facades\Storage::disk('public')->url($news->image)}}--}}
            <input type="file" class="form-control-file" name="image" id="image">
            @error('image') <strong style="color:red;">{{ $message }}</strong> @enderror
        </div>
        <div class="form-group">
            <label for="news_content">News content</label>
            <textarea class="form-control" name="news_content" id="news_content">{!! $news->inform !!}</textarea>
            @error('news_content') <strong style="color:red;">{!! $message !!}</strong> @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float:right;">update</button>
    </form>
@endsection
@section('js')
    <script src="{{asset('ckeditor5-build-classic-32.0.0/ckeditor5-build-classic/ckeditor.js')}}"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        ClassicEditor.create(document.querySelector('#news_content')).catch(error => {
            console.error(error);
        })
    </script>
@endsection
