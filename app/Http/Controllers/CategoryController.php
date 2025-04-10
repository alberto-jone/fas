<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Request $request, ?int $id, ?string $seoName): View|RedirectResponse
    {
        if (!$id) {
            return view('page-not-found');
        }

        $category = Category::find($id);

        if (!$category) {
            return view('page-not-found');
        }

        if (Str::lower($seoName) !== Str::lower($category->seo_name)) {
            return Redirect::route('category.show', ['id' => $id, 'seoName' => $category->seo_name], 301);
        }

        $navigation = Category::all();
        // Eager load a imagem ao buscar os artigos da categoria
        $articles = Article::where('category_id', $id)->with('image')->get();
        $section = $category->category_id; // Usando a chave correta da tabela 'categories'

        return view('category', [
            'navigation' => $navigation,
            'category' => $category,
            'articles' => $articles,
            'section' => $section,
        ]);
    }
}

