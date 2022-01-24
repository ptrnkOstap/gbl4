@extends('layouts/secondary')
@section('content')

    <div class="news_item">
        <h3 class="news_item_header"> {{$newsItem[2]}} </h3>
        <p class="news_item_text">
        {{$newsItem[0]}}
        <p class="news_item_category">
            <a href="{{route('category.show',$newsItem[1])}}"><strong> Category: {{$newsItem[1]}} </strong></a>
        </p>
        </p>
    </div>
@endsection
