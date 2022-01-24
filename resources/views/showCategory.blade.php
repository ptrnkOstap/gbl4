@extends('layouts/secondary')
@section('content')

    <h1>Category : <strong> {{$category = end($filtered)[1]}} </strong></h1>
    <h2>Here's what we have found</h2>

    <article class="random_news">

        @forelse($filtered as $newsItem)
            <div class="news_item">
               <a href="{{route('newsItem.show',$newsItem[3])}}"><h3 class="news_item_header">{{$newsItem[2]}}</h3></a>
                <p class="news_item_text">
                {{$newsItem[0] }}
                <p class="news_item_category">
                    <strong> Category: {{$newsItem[1]}} </strong>
                </p>
                </p>
            </div>
        @empty
            <p>no data</p>
    @endforelse
@endsection


