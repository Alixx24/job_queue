@extends('panel.layouts.master')
@section('title', 'show posts!')

@section('content')

<div class="conteiners">


    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <th scope="row">1</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->image == null ? 'havent Image' : 'have image' }}</td>
                <td>{{ $post->status == 1 ? 'is Active!' : 'Disabled!' }}</td>
                <td>{{ $post->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection