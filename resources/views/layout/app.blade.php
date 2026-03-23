<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/modal/modal.js') }}"></script>
</body>
</html>