<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id', // Se não for auto-incremento
        'comment',
        'posted',
        'article_id',
        'member_id',
        // Adicione outros campos conforme necessário
    ];

    protected $primaryKey = 'comment_id'; // Define a chave primária, se não for 'id'

    public $incrementing = false; // Se a chave primária não for auto-incremento
    protected $keyType = 'integer'; // Ou o tipo da sua chave primária

    protected $casts = [
        'posted' => 'datetime', // Adicione esta linha para converter 'posted' em DateTime
    ];

    /**
     * Define o relacionamento com o artigo ao qual o comentário pertence (articles).
     * Um comentário pertence a um artigo.
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id', 'article_id');
    }

    /**
     * Define o relacionamento com o membro que escreveu o comentário (members).
     * Um comentário pertence a um membro.
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id', 'member_id');
    }
}
