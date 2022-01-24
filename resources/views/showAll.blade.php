@extends('layouts/secondary')
@section('content')

        @forelse ($news as $newsItem)
            <div class="news_item">
                <h3 class="news_item_header"><a
                        href={{route('newsItem.show', ['id' => $newsItem[3]])}} > {{$newsItem[2]}} </a></h3>
                <p class="news_item_text">
                {{$newsItem[0]}}
                <p class="news_item_category">
                    <strong> Category: {{$newsItem[1]}} </strong>
                </p>
                </p>
            </div>
        @empty
            <p>no data</p>
    @endforelse
@endsection
