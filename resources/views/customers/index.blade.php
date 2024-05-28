@extends('customers.layouts.user-layout')
@section('title', 'Welcome')
<div class="conteiners">
    

@section('content')

    @foreach($latestPost as $post)
        <h3>Title: {{ $post->title }}</h3>
        <h5>created_at: {{ $post->created_at }} </h5>
        <a href="{{ route('home.customer.showPost', $post->id) }}">see more!</a>
    @endforeach
</div>
@endsection