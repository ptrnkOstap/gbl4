@extends('layouts.admin');

@section('content')
    <div class="form-control">
        <form  method="post" action="{{route('admin.users.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">User name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="email">User email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="is_admin">Make admin</label>
                <input type="string" name="is_admin" id="is_admin">
            </div>
            <div class="form-group">
                <label for="is_s_admin">Make super admin</label>
                <input type="text" name="is_s_admin" id="is_s_admin">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="create user">
            </div>
        </form>
    </div>
@endsection
