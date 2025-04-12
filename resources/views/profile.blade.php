<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meu Perfil - Creative Folk</title>
    <meta name="description" content="Página de perfil de membro Creative Folk">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
</head>
<body>
    <header>
        <a class="skip-link" href="#content">Skip to content</a>
        <nav class="member-menu">
            <div class="container">
                @if (!Auth::guard('member')->check())
                    <a href="{{ url('login') }}" class="nav-item nav-link">Log in</a> /
                    <a href="{{ route('member.register') }}" class="nav-item nav-link">Register</a>
                @else
                    <a href="{{ url('member/' . Auth::guard('member')->id()) }}" class="nav-item nav-link">{{ Auth::guard('member')->user()->forename }}</a> /
                    <a href="{{ route('member.profile') }}" class="nav-item nav-link">Profile</a> /
                    @if (Auth::guard('member')->user()->role == 'admin')
                        <a href="{{ url('admin/index') }}" class="nav-item nav-link">Admin</a> /
                    @endif
                    <form method="POST" action="{{ route('member.logout') }}">
                        @csrf
                        <input type="submit" value="Logout" class="nav-item nav-link btn btn-sm btn-link">
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

    <div class="container content-wrapper">
        <main id="content">
            <section class="profile-section">
                <h1>Meu Perfil</h1>

                <div class="profile-info">
                    <div class="profile-avatar">
                        <img src="{{ asset('img/default-avatar.png') }}" alt="Avatar do Usuário">
                    </div>

                    <div class="profile-details">
                        <p><strong>Nome:</strong> {{ Auth::guard('member')->user()->forename }} {{ Auth::guard('member')->user()->surname ?? '' }}</p>
                        <p><strong>Email:</strong> {{ Auth::guard('member')->user()->email }}</p>
                        <p><strong>Membro desde:</strong> {{ Auth::guard('member')->user()->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>

                <div class="profile-actions">
                    <h2>Ações</h2>
                    <ul>
                        <li><a href="{{ route('member.profile.edit') }}">Editar Perfil</a></li>
                        <li><a href="#">Minhas Publicações</a></li>
                        <li><a href="#">Mensagens</a></li>
                    </ul>
                </div>

                <div class="profile-settings">
                    <h2>Configurações</h2>
                    <ul>
                        <li><a href="{{ route('member.password.edit') }}">Alterar Senha</a></li>
                        <li><a href="#">Notificações</a></li>
                        <li><a href="#">Privacidade</a></li>
                    </ul>
                </div>
            </section>
        </main>
    </div>

    <footer>
        <div class="container">
            <a href="{{ url('contact') }}">Contact us</a>
            <span class="copyright">&copy; Creative Folk {{ date('Y') }}</span>
        </div>
    </footer>
    <script src="{{ asset('js/site.js') }}"></script>
</body>
</html>
