<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table/button.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table/table-design.css') }}">
    <script src="https://kit.fontawesome.com/4d2a01d4ef.js" crossorigin="anonymous" defer></script>
</head>
<body>
    <x-header />
    <div class="content">
        <div class="sidebar">
            <x-sidebar />
        </div>
        <div class="content-container">

            <div id="toast-container"></div>

            @if(session('success'))
            <script>
                window.addEventListener('DOMContentLoaded', () => {
                    showToast("{{ session('success') }}", "success");
                });
            </script>
            @endif

            @if(session('error'))
            <script>
                window.addEventListener('DOMContentLoaded', () => {
                    showToast("{{ session('error') }}", "error");
                });
            </script>
            @endif

            @if ($errors->any())
            <script>
                window.addEventListener('DOMContentLoaded', () => {
                    @foreach ($errors->all() as $error)
                        showToast("{{ $error }}", "error");
                    @endforeach
                });
            </script>
            @endif

            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/modal/modal.js') }}"></script>
</body>
</html>