@extends('customers.layouts.user-layout')
@section('title', 'profile ' . $user->name )
    
@section('content')
    <div class="container">
        <th>name: {{ $user->name }}</th><br>
        <th>email: {{ $user->email }}</th><br>

        <th>avatar: {{ $user->avatar }}</th><br>

            <div>
                <th>age: {{ $user->birth_day }}   </th>
                <form action="{{ route('user.profile.update') }}" method="post">
                @csrf
                
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Age</label>
                    <input type="number" name="birth_day" class="form-control" id="body" placeholder="insert your body">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">public mail</label>
                    <input type="email" name="public_mail" class="form-control" id="body" placeholder="insert your body">
                </div>
                 <button type="submit" class="btn btn-primary">update age</button>
                </form>
           
               
        </div><br>
            
         
        <th>joined: {{ $user->created_at }}</th>
    </div>
@endsection