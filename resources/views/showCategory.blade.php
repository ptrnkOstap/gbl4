@extends('layouts/secondary')
@section('content')
    {{--    {{dd($filtered)}}--}}
{{--    <h1>Category : <strong> {{$filtered[0]->category->category}} </strong></h1>--}}
    <h3>Here's what we have found</h3>

    <article class="random_news">

        @forelse($filtered as $newsItem)
            <div class="news_item">
                <a href="{{route('newsItem.show',$newsItem['id'])}}"><h3
                        class="news_item_header">{{$newsItem['title']}}</h3></a>
                <p class="news_item_text">
                {{$newsItem['inform'] }}
                <p class="news_item_category">
                    <strong> Category: {{$newsItem['category']->category}} </strong>
                </p>
                </p>
            </div>
        @empty
            <p>no data</p>
    @endforelse
@endsection


