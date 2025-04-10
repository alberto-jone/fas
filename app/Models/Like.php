<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa a trait HasFactory.
use Illuminate\Database\Eloquent\Model; // Importa a classe Model.
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Importa a relação BelongsTo.

class Like extends Model
{
    use HasFactory; // Utiliza a funcionalidade de factories.

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'article_id', // Permite a atribuição em massa do ID do artigo que foi curtido.
        'user_id', // Permite a atribuição em massa do ID do usuário que curtiu o artigo.
    ];

    /**
     * Define o relacionamento com o artigo que foi curtido.
     *
     * @return BelongsTo
     */
    public function article(): BelongsTo
    {
        // Uma curtida pertence a um artigo. Define o relacionamento com o modelo Article.
        return $this->belongsTo(Article::class);
    }

    /**
     * Define o relacionamento com o usuário que curtiu o artigo.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        // Uma curtida pertence a um usuário. Define o relacionamento com o modelo User (assumindo que você tem um modelo User).
        return $this->belongsTo(User::class);
    }
}
