<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>

    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link href='/css/billboardchart.css' rel='stylesheet'>

    @yield('head')
</head>
<body>

<header>
    <p><img src='/images/billboard-logo.jpg' border='0'></p>
    <h1>Top Album Charts</h1>
</header>

<section>
    @yield('content')
</section>

<footer>
    <p>&copy; {{ date('Y') }} Plencner Labs. </p>
    <p><a href='{{ config('app.githubUrl') }}'><i class='fab fa-github'></i> View on Github</a></p>
</footer>

</body>
</html>