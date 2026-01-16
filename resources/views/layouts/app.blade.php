<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> asda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    {{-- Header --}}
    @include('partials.header')

    {{-- Page Content --}}
    <main style="padding:20px;">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

</body>

</html>
