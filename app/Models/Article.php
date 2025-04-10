<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'summary',
        'content',
        'created', // Pode ser gerenciado automaticamente pelo Laravel
        'image_id',
        'published',
        'seo_title',
        'member_id', // Adicione 'member_id' aos campos fillable
        // Adicione outros campos conforme necessário
    ];

    protected $casts = [
        'published' => 'boolean',
        'created' => 'datetime', // Se não estiver usando timestamps automáticos
    ];

    /**
     * Define o relacionamento com a categoria a qual o artigo pertence (categories).
     * Um artigo pertence a uma categoria.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    /**
     * Define o relacionamento com os comentários associados ao artigo (comments).
     * Um artigo tem muitos comentários.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'article_id', 'article_id');
    }

    /**
     * Define o relacionamento com a imagem associada ao artigo (images).
     * Um artigo pertence a uma imagem (um-para-um, assumindo 'image_id' como chave estrangeira).
     */
    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id', 'image_id');
    }

    /**
     * Define o relacionamento muitos-para-muitos com os membros que curtiram o artigo (likes).
     * Muitos artigos podem ser curtidos por muitos membros.
     */
    public function likedBy(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'likes', 'article_id', 'member_id');
    }

    /**
     * Define o relacionamento com o membro que escreveu o artigo (members).
     * Um artigo pertence a um membro.
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id', 'member_id');
    }
}
