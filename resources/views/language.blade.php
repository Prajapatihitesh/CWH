@extends('component.layout')

@section('header')
<header class="navbar navbar-dark bg-dark px-4 position-fixed  top-0 w-100 z-2">
    <a href="{{route('index')}}" class="navbar-brand align-middle d-flex align-items-center bg-color">
            <span class="fs-3">{ / }  CodeWithHitesh ;</span>
    </a>
    <button class="navbar-toggler" type="button" id="navBtn" onclick="toggleSidebar()">
        <span class="navbar-toggler-icon" ></span>
    </button>
</header>
@endsection

@section('top_nav')
    @foreach ($languages as $language)
        <div class='nav-item'>
            @if ($lid == $language->id)
                @php
                    $current_name = $language->name;
                @endphp
                <a href='{{ route('language', $language->id) }}' class='nav-link active d-flex align-items-center'>
                @else
                    <a href='{{ route('language', $language->id) }}' class='nav-link d-flex align-items-center'>
            @endif
            {{ $language->name }}
            </a>
        </div>
    @endforeach
@endsection

@section('sidebar')
    <nav id="sidebar" class="bg-dark">
        <h3 class="p-3 m-0">{{ $current_name }} Topics</h3>
        <ul class="nav flex-column nav-pills">
            <li class="nav-item">
                @foreach ($topics as $topic)
                    @if ($tid == $topic->id)
                        @php
                            $current_topic = $topic->name;
                        @endphp
                        <a href='{{ route('language', [$lid, $topic->id]) }}'
                            class='nav-link active d-flex align-items-center'>
                        @else
                            <a href='{{ route('language', [$lid, $topic->id]) }}' class='nav-link d-flex align-items-center'>
                    @endif
                    {{ $topic->name }}</a>
                @endforeach
            </li>
        </ul>
    </nav>
@endsection

@section('main')
    <div class="pt-4">
        <h1 class="text-center col-11" style=" text-align: justify text-justify: inter-word;">{{ $current_name }}
            {{ $current_topic }}</h1>
        <hr>
        @foreach ($subTopics as $subTopic)
            <div class="p-2 col-11" style=" text-align: justify; text-justify: inter-word;">
                <h2>{{ $subTopic->name }}</h2>
                <p class="fs-5">{{ $subTopic->definition }}</p>
            </div>
            @if ($subTopic->example != null)
                <div class="card my-4 col-11" style=" text-align: justify; text-justify: inter-word;">
                    <div class="card-header">
                        <h3>Example</h3>
                    </div>
                    <div class="card-body">
                        <pre class="bg-light p-3 rounded"><code>{{ $subTopic->example }}</code></pre>
                    </div>
                </div>

                <div class="card my-4 col-11" style=" text-align: justify; text-justify: inter-word;">
                    <div class="card-header">
                        <h3>Output</h3>
                    </div>
                    <div class="card-body">
                        <pre class="bg-dark text-white p-3 rounded"><code>{{ $subTopic->output }}</code></pre>
                    </div>
                </div>
            @endif
        @endforeach
        <!-- Optional: Add a back button -->
        <a href="{{ url('/') }}" class="btn btn-primary mt-3">Back to List</a>
    </div>
@endsection
