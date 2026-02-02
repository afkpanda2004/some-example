<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @vite('resources/sass/app.scss')

</head>
<body>
<div class = "container">
    <div class = "row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="{{ route('main.index') }}">Main</a>
                    <a class="nav-item nav-link" href="{{ route('about.index') }}">About</a>
                    <a class="nav-item nav-link" href="{{ route('contact.index') }}">Contact</a>
                    <a class="nav-item nav-link" href="{{ route('post.index') }}">Posts</a>
                </div>
            </div>
        </nav>

    </div>
    @yield('content')

</div>

</body>
</html>


