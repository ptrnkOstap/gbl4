@extends('layouts.admin')
@section('content')

    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>News ID</th>
            <th>Actions</th>
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
                {{--                                {{dd($newsItem->id)}}--}}
                <td><p>{{$newsItem['id']}}</p></td>
                <td><a href="{{ route('newsItem.show', ['news' => $newsItem['id']])}}">View</a>&nbsp;| &nbsp;<a
                        {{--                        {{dd($newsItem['id'])}}--}}
{{--                        href="{{ route('admin.edit',['news'=>$newsItem])}} ">Edit</a>--}}
                </td>
                <td>{{$newsItem['category']->category}}</td>
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
    {{ $news->links() }}

@endsection
