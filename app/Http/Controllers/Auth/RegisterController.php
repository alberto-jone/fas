<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Category; // Importe o seu Model Category
use Illuminate\View\View;
use Illuminate\Http\Request; // Importe a classe Request
use Illuminate\Support\Facades\Redirect; // Importe a classe Redirect

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/'; // Ou a rota para onde você quer redirecionar após o login automático

    public function __construct()
    {
        $this->middleware('guest:member');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'forename' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return Member::create([
            'forename' => $data['forename'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function guard()
    {
        return Auth::guard('member');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $member = $this->create($request->all());

        Auth::guard('member')->login($member); // Loga o membro recém-registrado

        return $this->registered($request, $member)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function showRegistrationForm(): View
    {
        $navigation = Category::all(); // Busca todas as categorias (ou a lógica para sua navegação)
        return view('auth.register', ['navigation' => $navigation]); // Passa a variável 'navigation' para a view
    }
}
