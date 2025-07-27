<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | Code With Hitesh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin/layout.css">
</head>
<body>
    @php
        $path = Str::after(Request::url(), 'admin/');
        $path = explode('/', $path);
        $path = $path[0];
    @endphp
    <header class="navbar navbar-dark bg-dark px-4 position-fixed  top-0 w-100 z-2">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand align-middle d-flex align-items-center bg-color">
            <span class="fs-3">{ / } CodeWithHitesh ;</span>
        </a>
        <button class="navbar-toggler" type="button" id="navBtn" onclick="toggleSidebar()">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>

    <nav id="sidebar" class="">
        <ul class="nav flex-column nav-pills">
            <li class="nav-item">
                <a href='{{ route('admin.dashboard') }}'
                @if ($path == 'dashboard')
                        class='nav-link active d-flex align-items-center'>
                    @else
                         class='nav-link d-flex align-items-center'>
                    @endif
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href='{{ route('admin.language.index') }}'
                @if ($path == 'language')
                        class='nav-link active d-flex align-items-center'>
                    @else
                         class='nav-link d-flex align-items-center'>
                    @endif
                    Manage Languages
                </a>
            </li>
            <li class="nav-item">
                <a href='{{ route('admin.topic.index') }}'
                @if ($path == 'topic')
                        class='nav-link active d-flex align-items-center'>
                    @else
                         class='nav-link d-flex align-items-center'>
                    @endif
                    Manage Topics
                </a>
            </li>
        </ul>
    </nav>


<div class="z-1" id="content">
    @yield('main')
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }
        $(document).ready(function(){


        });

        </script>
        @yield('script')
</body>
</html>
