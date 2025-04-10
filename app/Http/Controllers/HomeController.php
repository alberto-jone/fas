<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Exibe a página inicial com os últimos artigos e a navegação.
     *
     * @return View
     */
    public function index(): View
    {
        // Busca os 6 artigos mais recentes, ordenando pela coluna 'created' (sua coluna de data)
        // e carrega os relacionamentos 'category', 'image' E 'member'.
        $articles = Article::orderBy('created', 'desc')
            ->take(6)
            ->with(['category', 'image', 'member'])
            ->get();

        $navigation = Category::all();

        return view('index', [
            'articles' => $articles,
            'navigation' => $navigation,
        ]);
    }
}
