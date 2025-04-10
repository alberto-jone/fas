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
    {{-- <link rel="stylesheet" href="{{ asset('') }}"> --}}

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
                    <a href="{{ url('member/' . session('id')) }}" class="nav-item nav-link">{{ session('forename') }}</a> /
                    <a href="{{ url('member/' . session('id')) }}" class="nav-item nav-link">Profile</a> /
                    @if (session('role') == 'admin')
                        <a href="{{ url('admin/index') }}" class="nav-item nav-link">Admin</a> /
                    @endif
                    <form method="POST" action="{{ route('member.logout') }}">
                        @csrf
                        <button type="submit" class="nav-item nav-link" style="border:none; background:none; padding:0; margin:0; cursor:pointer;">Logout</button>
                    </form>
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
                                <a href="{{ url('category/' . $link->category_id . '/' . $link->seo_name) }}"
                                    @isset($section)
                                        @if ($section == $link->category_id) class="on" @endif
                                    @endisset
                                >
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
        </div>
    </header>
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
