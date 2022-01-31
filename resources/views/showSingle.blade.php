@extends('layouts/secondary')
@section('content')

    <div class="news_item">
        <h3 class="news_item_header"> {{$newsItem['title']}} </h3>
        <p class="news_item_text">
        {{$newsItem['inform']}}
        <p class="news_item_category">
            <a href="{{route('category.show',$newsItem['category_id'])}}"><strong> Category: {{$newsItem['category']}} </strong></a>
        </p>
        </p>
    </div>
@endsection
