@extends('layouts/secondary')
@section('content')
    {{--{{dd($news)}}--}}
    <div class="news_item">
        <h3 class="news_item_header"> {{$news['title']}} </h3>
        <p class="news_item_text">
        {{$news['inform']}}
        <p class="news_item_category">
{{--            {{dd($news->category->category)}}--}}
            <a href="{{route('category.show',['category'=>$news->category->id])}}"><strong>
                    Category: {{$news['category']->category}} </strong></a>
        </p>
        </p>
    </div>
@endsection
