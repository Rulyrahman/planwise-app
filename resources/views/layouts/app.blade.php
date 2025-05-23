<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Goodtimes')</title>

    @vite(['resources/css/app.css', 'resources/css/responsive.css', 'resources/js/app.js'])

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    @if (!in_array(request()->path(), ['login', 'register']))
        @include('layouts.navbar')
    @endif

    <div class="main-content">
        @yield('content')
    </div>

    @if (!in_array(request()->path(), ['login', 'register']))
        @include('layouts.footer')
    @endif

</body>

</html>
