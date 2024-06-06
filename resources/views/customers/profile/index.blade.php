@extends('customers.layouts.user-layout')
@section('title', 'profile ' . $user->name )
    
@section('content')
    <div class="container">
        <th>name: {{ $user->name }}</th><br>
        <th>email: {{ $user->email }}</th><br>

        <th>avatar: {{ $user->avatar }}</th><br>

            <div>
                <th>age: {{ $user->birth_day }}   </th>
                <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Age</label>
                    <input type="number" name="birth_day" class="form-control" id="body" placeholder="your age">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">public mail</label>
                    <input type="email" name="public_mail" class="form-control" id="body" placeholder="your public mail">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">avatar</label>
                    <input type="file" name="avatar" class="form-control" placeholder="your avatar">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">contact me</label>
                    <input type="text" name="link-us" class="form-control" id="body" placeholder="your public mail">
                </div>
                 <button type="submit" class="btn btn-primary">update</button>
                </form>
                <th>public email: {{ $user->public_mail }}</th>             
        </div><br>
                
        <th>joined: {{ $user->created_at }}</th>
    </div>
@endsection