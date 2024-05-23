@extends('customers.layouts.user-layout')
@section('title', 'show')
<div class="conteiners">

    <h3>Title: {{ $post->title }}</h3>
    <h5>created_at: {{ $post->created_at }} </h5>
    <h5>{{ $post->body }}</h5>
</div>
@section('content')

@endsection