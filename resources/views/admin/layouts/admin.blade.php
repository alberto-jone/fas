<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Creative Folk')</title>
    <meta name="description" value="@yield('description', 'Hire creatives')">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
</head>
<body>
    <header class="header-admin">
        <a class="skip-link" href="#content">Skip to content</a>
        <nav class="member-menu">
            <div class="container">
                @if (session('id') == 0)
                    <span class="icon-user"></span><a href="{{ url('login') }}" class="nav-item nav-link">Log in</a> /
                    <span class="icon-user"></span><a href="{{ url('register') }}" class="nav-item nav-link">Register</a>
                @else
                    <span class="icon-user"></span><a href="{{ url('member/' . session('id')) }}">{{ session('forename') }}</a> /
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
                    <li><a href="{{ url('admin/articles') }}" class="nav-item nav-link">Articles</a></li>
                    <li><a href="{{ url('admin/categories') }}" class="nav-item nav-link">Categories</a></li>
                    <li><a href="{{ url('admin/members') }}" class="nav-item nav-link">Members</a></li>
                </ul>
            </nav>
        </div>
    </header>
    @yield('content')
    <footer>
        <div class="container">
            <span class="copyright">&copy; Creative Folk {{ date('Y') }}</span>
        </div>
    </footer>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        if (document.getElementById('article-content')){
            tinymce.init({
                menubar: false,
                selector: '#article-content',
                toolbar: 'bold italic link',
                plugins: 'link',
                target_list: false,
                link_title: false
            });
        };
    </script>
    <script src="{{ asset('js/site.js') }}"></script>
</body>
</html>