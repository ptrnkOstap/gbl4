@extends('layouts/secondary')
@section('content')

    @forelse ($news as $newsItem)
        <div class="news_item">
            <h3 class="news_item_header"><a
                    href={{route('newsItem.show', ['news' => $newsItem->id])}} > {{$newsItem->title}} </a></h3>
            <p class="news_item_text">
            {{$newsItem['inform']}}
            <p class="news_item_category">
                <a href={{route('category.show',['category'=>$newsItem->category->id])}}><strong> Category: {{$newsItem['category']->category}} </strong></a>
            </p>
            </p>
        </div>
    @empty
        <p>no data</p>
    @endforelse
@endsection
