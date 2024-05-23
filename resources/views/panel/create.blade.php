@extends('panel.layouts.master')
@section('title', 'create posts!')

@section('content')
<div class="containers">
    <form action="{{ route('panel.post.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">title</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">body</label>
            <input name="body" type="text" class="form-control" id="body" placeholder="insert your body">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection