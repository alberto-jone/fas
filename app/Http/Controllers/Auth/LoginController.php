<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Category; // Importe o seu Model Category
use Illuminate\View\View;
use Illuminate\Http\Request; // Importe a classe Request
use Illuminate\Support\Facades\Session; // Importe a classe Session

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';
    protected $username = 'email';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('member');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->loggedOut($request) ?: redirect('/login');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function showLoginForm(): View
    {
        $navigation = Category::all(); // Busca todas as categorias
        return view('auth.login', ['navigation' => $navigation]); // Passa a variável 'navigation'
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $user = $this->guard()->user(); // Obtenha o usuário autenticado

        // Defina as variáveis de sessão com os dados do membro logado
        Session::put('id', $user->id);
        Session::put('forename', $user->forename);
        Session::put('role', $user->role);

        return $this->authenticated($request, $user)
                    ?: redirect()->intended($this->redirectPath());
    }
}
