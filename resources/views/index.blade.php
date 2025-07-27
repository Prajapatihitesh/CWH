@extends('component.layout')

@section('header')
<header class="navbar navbar-dark bg-dark px-4 position-fixed  top-0 w-100 z-2">
    <a href="{{route('index')}}" class="navbar-brand align-middle d-flex align-items-center bg-color">
            <span class="fs-3">{ / }  CodeWithHitesh ;</span>
    </a>
</header>
@endsection

@section('top_nav')
        @foreach ($languages as $language )
        <div class='nav-item'>
            <a href='{{route('language',$language->id)}}' class='nav-link d-flex align-items-center'>
                {{$language->name}}
            </a>
        </div>
        @endforeach
@endsection
@section('main')
    <div id="content">
        <h1>Welcome to the Dashboard</h1>
        <p>This is the main content area where additional information or widgets can be displayed.</p>
    </div>
@endsection
