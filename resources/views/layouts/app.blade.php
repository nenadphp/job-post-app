<!DOCTYPE html>
<html>
<head>
    <title>Job post</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="main-navigation">
        <div class="navbar-header animated fadeInUp">
            <a class="navbar-brand" href="#">Jobs posts</a>
        </div>
        <ul class="nav-list">
            @if (!Auth::user())
                <li class="nav-list-item">
                    <a href="/register" class="nav-link">REGISTER</a>
                </li>
                <li class="nav-list-item">
                    <a href="/login" class="nav-link">LOGIN</a>
                </li>
            @endif
            @if(Auth::user())
                <li class="nav-list-item">
                    <a href="/logout" class="nav-link">LOGOUT</a>
                </li>
                    <li class="nav-list-item">
                    <a href="/" class="nav-link">HOME</a>
                </li>
                    <li class="nav-list-item">
                    <a href="/jobs" class="nav-link">JOBS LIST</a>
                </li>
                <li class="nav-list-item">
                    <a href="/job-add" class="nav-link">ADD JOB</a>
                </li>
             @endif
        </ul>
    </nav>

@yield('content')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>