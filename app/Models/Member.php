<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait; // Importe a trait

class Member extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait; // Use a trait

    protected $fillable = [
        'member_id', // Se não for auto-incremento
        'forename',
        'surname',
        'email',
        'password',
        'joined',
        'picture',
        'role',
        'remember_token', // Adicione remember_token ao $fillable
        // Adicione outros campos conforme necessário
    ];

    protected $primaryKey = 'member_id'; // Define a chave primária, se não for 'id'

    public $incrementing = false; // Se a chave primária não for auto-incremento
    protected $keyType = 'integer'; // Ou o tipo da sua chave primária

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Define o relacionamento muitos-para-muitos com os artigos que o membro curtiu (likes).
     * Muitos membros podem curtir muitos artigos.
     */
    public function likedArticles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'likes', 'member_id', 'article_id');
    }

    /**
     * Define o relacionamento com os comentários escritos pelo membro (comments).
     * Um membro tem muitos comentários.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'member_id', 'member_id');
    }

    /**
     * Define o relacionamento com os tokens associados ao membro (tokens).
     * Um membro tem muitos tokens (assumindo um relacionamento um-para-muitos).
     */
    public function tokens(): HasMany
    {
        return $this->hasMany(Token::class, 'member_id', 'member_id');
    }
}
