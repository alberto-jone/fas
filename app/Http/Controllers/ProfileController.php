<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category; // Se você precisa da navegação

class ProfileController extends Controller
{
    public function show()
    {
        $navigation = Category::all(); // Ou a sua lógica para obter a navegação
        return view('profile', ['navigation' => $navigation]);
    }
}
