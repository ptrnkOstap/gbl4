@extends('layouts/secondary')
@section('content')


    <div class="form-group">

        <form method="post" action="{{route('feedBack.store')}}" >
            @csrf
            <label for="user_name">Your name:</label>
            <input type="text" class="form-control" id="user_name" name="user_name">
            <label for="user_email">Your email:</label>
            <input type="email" class="form-control" id="user_email" name="user_email">
            <label for="user_message">Write your message</label>
            <textarea name="user_message" class="form-control" id="user_message" cols="30" rows="10"></textarea>
            <br>
            <input type="submit" class="btn btn-success">
        </form>
    </div>
@endsection
