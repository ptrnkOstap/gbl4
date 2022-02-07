@extends('layouts.main')
@section('content')


    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse ($news as $newsItem)
            {{--            {{dd($newsItem)}}--}}
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                         xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                         preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"/>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>

                    <div class="card-body">
                        <div class="card-header">
                            <a href={{ route('newsItem.show', ['news' => $newsItem->id])}}>{{$newsItem->title}}</a>
                        </div>
                        <p class="card-text">{{$newsItem['inform']}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            </div>
                            <small class="text-muted">Category: {{ $newsItem['category']->category }}</small>
                            <small class="text-muted">{{{ $newsItem['created_at'] }}}</small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h1> no news today</h1>
        @endforelse
    </div>

    {{--    <article class="categories">--}}
    {{--        <ul>--}}
    {{--            @foreach ($categories as $category)--}}
    {{--                <li><a href={{route('category.show', ['category' => $category])}} > {{ $category}} </a></li>--}}
    {{--            @endforeach--}}
    {{--        </ul>--}}
    {{--    </article>--}}
@endsection
