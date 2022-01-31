@extends('layouts.admin')
@section('content')

    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>News ID</th>
            <th>Category</th>
            <th>Title</th>
            <th>Visibility</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
        </thead>
        <tbody>
        @forelse($news as $newsItem)
            <tr>
                <td><a href={{ route('newsItem.show', ['id' => $newsItem['id']])}}>{{$newsItem['id']}}</a></td>
                <td>{{$newsItem['category']}}</td>
                <td>{{$newsItem['title']}}</td>
                <td>{{$newsItem['is_private']}}</td>
                <td>{{$newsItem['created_at']}}</td>
                <td>{{$newsItem['updated_at']}}</td>
            </tr>
        </tbody>
        @empty
            <h2>There are no news entries</h2>
        @endforelse
    </table>

@endsection
