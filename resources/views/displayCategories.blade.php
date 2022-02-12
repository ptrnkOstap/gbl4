@extends('layouts.admin')
@section('content')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Category ID</th>
                <th>Category name</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td >{{$category->id}}</td>
                    <td >{{$category->category}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
