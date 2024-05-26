@extends('customers.layouts.user-layout')
@section('title','login')

@section('content')
<div class="container">
    <form action="{{ route('user.checkLogin') }}" method="POST">
        @csrf
    
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection