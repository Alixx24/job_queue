@extends('panel.layouts.master')
@section('title', 'create posts!')

@section('content')
<div class="conteiners">

    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-header">posts static</div>
        <div class="card-body">
            <h5 class="card-title">Counts of post: {{ $countPost }}</h5>
            <h4 class="card-title">Actived: {{ $postStatusActived }}</h3>
                <h4 class="card-text">Disabled: {{ $postStatusDisabled }}</h4>
        </div>
    </div>

</div>
@endsection