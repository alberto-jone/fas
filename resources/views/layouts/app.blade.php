<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Creative Folk')</title>
    <meta name="description" content="@yield('description', 'Hire creatives')">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
</head>
<body>
    <header>
        <a class="skip-link" href="#content">Skip to content</a>
        <nav class="member-menu">
            <div class="container">
                @if (session('id') == 0)
                    <a href="{{ url('login') }}" class="nav-item nav-link">Log in</a> /
                    <a href="{{ url('register') }}" class="nav-item nav-link">Register</a>
                @else
                    <a href="{{ url('member/' . session('id')) }}">{{ session('forename') }}</a> /
                    @if (session('role') == 'admin')
                        <a href="{{ url('admin/index') }}">Admin</a> /
                    @endif
                    <a href="{{ url('logout') }}">Logout</a>
                @endif
            </div>
        </nav>
        <div class="container">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="Creative Folk"></a>
            </div>
            <nav>
                <button id="toggle-navigation" aria-expanded="false">
                    <span class="icon-menu"></span><span class="hidden">Menu</span>
                </button>
                <ul id="menu">
                    @foreach ($navigation as $link)
                        @if ($link->navigation == 1)
                            <li>
                                <a href="{{ url('category/' . $link->id . '/' . $link->seo_name) }}"
                                    @if ($section == $link->id) class="on" @endif>
                                    {{ $link->name }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                    <li>
                        <a href="{{ url('search') }}">
                            <span class="icon-search"></span><span class="search-text">Search</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div></header>
    @yield('content')
    <footer>
        <div class="container">
            <a href="{{ url('contact') }}">Contact us</a>
            <span class="copyright">&copy; Creative Folk {{ date('Y') }}</span>
        </div>
    </footer>
    <script src="{{ asset('js/site.js') }}"></script>
</body>
</html>