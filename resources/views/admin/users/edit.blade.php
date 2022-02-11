@extends('layouts.admin')
@section('content')

    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Email verified at</th>
            <th>Is admin / Is super admin</th>
            <th>Actions</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                {{--                                {{dd($newsItem->id)}}--}}
                <td>{{$user['id']}}</td>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user['email_verified_at']}}</td>
                <td>{{$user['is_admin']}} / {{$user['is_s_admin']}}</td>
                <td>actions</td>
                <td>{{$user['created_at']}}</td>
                <td>{{$user['updated_at']}}</td>
            </tr>
        </tbody>
        @empty
            <h2>no data</h2>
        @endforelse
    </table>
@endsection
