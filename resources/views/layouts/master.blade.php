<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>

    <link href='/css/billboardcharts.css' rel='stylesheet'>

    @yield('head')
</head>
<body>

<header>
    <h1>Billboard Top Album Charts</h1>
</header>

<section>
    @yield('content')
</section>

<footer>
    &copy; {{ date('Y') }}
</footer>

</body>
</html>