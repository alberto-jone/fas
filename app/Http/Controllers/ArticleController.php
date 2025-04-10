<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like; // Você pode usar o relacionamento likedBy em vez deste Model diretamente
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class ArticleController extends Controller
{
    public function show(Request $request, ?int $id, ?string $seoTitle): View|RedirectResponse
    {
        if (!$id) {
            return view('page-not-found');
        }

        // Eager load os relacionamentos necessários: category, comments, image
        $article = Article::with(['category', 'comments', 'image'])->find($id);

        if (!$article) {
            return view('page-not-found');
        }

        if (Str::lower($seoTitle) !== Str::lower($article->seo_title)) {
            return Redirect::route('article.show', ['id' => $id, 'seoTitle' => $article->seo_title], 301);
        }

        $error = null;

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'comment' => 'required|string|min:1|max:2000',
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->first('comment');
            } else {
                $commentText = $request->input('comment');
                $comment = Purifier::clean($commentText, ['HTML.Allowed' => 'br,b,i,a[href]']);

                Comment::create([
                    'comment' => $comment,
                    'article_id' => $article->article_id, // Use a chave correta da tabela 'articles'
                    'member_id' => Session::getId(), // Usando 'member_id' conforme o diagrama
                ]);

                return Redirect::route('article.show', ['id' => $id, 'seoTitle' => $article->seo_title]);
            }
        }

        $navigation = Category::all();
        $liked = null;

        if (Session::getId() > 0) {
            // Verifica se o membro logado curtiu este artigo usando o relacionamento
            $liked = $article->likedBy()
                ->wherePivot('member_id', Session::getId())
                ->exists();
        }

        return view('article', [
            'navigation' => $navigation,
            'article' => $article, // Passa o Model Article com os relacionamentos carregados
            'section' => $article->category_id,
            'comments' => $article->comments, // Acessa os comentários através do relacionamento
            'liked' => $liked,
            'error' => $error,
        ]);
    }
}
