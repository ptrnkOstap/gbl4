@extends('layouts.admin')
@section('header')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{route('admin.users.create')}}" class="btn btn-sm btn-outline-secondary">Create user</a>
            </div>
        </div>
    </div>
@endsection
@section('content')


    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th class="text-center">User ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Email verified at</th>
            <th class="text-center">Is admin / Is super admin</th>
            <th class="text-center">Actions</th>
            <th class="text-center">Created at</th>
            <th class="text-center">Updated at</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                {{--                                {{dd($newsItem->id)}}--}}
                <td class="text-center">{{$user['id']}}</td>
                <td class="text-center">{{$user['name']}}</td>
                <td class="text-center">{{$user['email']}}</td>
                <td class="text-center">{{$user['email_verified_at']}}</td>
                <td class="text-center">{{$user['is_admin']==1? 'true':'-'}} / {{$user['is_s_admin']==1? 'true':'-'}}</td>
                <td class="text-center"><a href="{{route('admin.users.edit',['user'=>$user])}}">edit user</a></td>
                <td class="text-center">{{$user['created_at']}}</td>
                <td class="text-center">{{$user['updated_at']}}</td>
            </tr>
        </tbody>
        @empty
            <h2>no data</h2>
        @endforelse
    </table>
@endsection
