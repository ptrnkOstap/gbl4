@extends('layouts.admin')

@section('content')
    <div class="form-control">
        <form method="post" action="{{route('admin.users.update',['user'=>$user])}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">User name</label>
                <input type="text" name="name" id="name" value={{old($user->name)??$user->name}}>
                @error('name') <strong style="color:red;">{{ $message }}</strong>@enderror
            </div>
            <div class="form-group">
                <label for="email">User email</label>
                <input type="email" name="email" id="email" value={{old($user->email)??$user->email}}>
                @error('email') <strong style="color:red;">{{ $message }}</strong>@enderror
            </div>
            {{--            <div class="form-group">--}}
            {{--                <label for="password">Password</label>--}}
            {{--                <input type="password" name="password" id="password">--}}
            {{--            </div>--}}
            <div class="form-group">
                <label for="is_admin">Make admin</label>
                <select type="text" name="is_admin" id="is_admin">
                    <option @if($user->is_admin===1) selected @endif value="1">true</option>
                    <option @if($user->is_admin===0) selected @endif value="0">false</option>
                </select>
                @error('is_admin') <strong style="color:red;">{{ $message }}</strong>@enderror
            </div>
            <div class="form-group">
                <label for="is_s_admin">Make super admin</label>
                <select type="text" name="is_s_admin" id="is_s_admin">
                    <option @if($user->is_s_admin===1) selected @endif value="1">true</option>
                    <option @if($user->is_s_admin===0) selected @endif value="0">false</option>
                </select>
                @error('is_s_admin') <strong style="color:red;">{{ $message }}</strong>@enderror
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="update user">
            </div>
        </form>
    </div>
@endsection
