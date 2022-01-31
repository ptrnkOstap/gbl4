@extends('layouts/secondary')
@section('content')

        @forelse ($news as $newsItem)
            <div class="news_item">
                <h3 class="news_item_header"><a
                        href={{route('newsItem.show', ['id' => $newsItem['id']])}} > {{$newsItem['title']}} </a></h3>
                <p class="news_item_text">
                {{$newsItem['inform']}}
                <p class="news_item_category">
                    <strong> Category: {{$newsItem['category']}} </strong>
                </p>
                </p>
            </div>
        @empty
            <p>no data</p>
    @endforelse
@endsection
