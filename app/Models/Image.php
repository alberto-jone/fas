<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_id', // Se não for auto-incremento
        'file',
        'alt',
        // Adicione outros campos conforme necessário
    ];

    protected $primaryKey = 'image_id'; // Define a chave primária, se não for 'id'

    public $incrementing = false; // Se a chave primária não for auto-incremento
    protected $keyType = 'integer'; // Ou o tipo da sua chave primária

    /**
     * Define o relacionamento um-para-um com o artigo que usa esta imagem (articles).
     * Uma imagem pode pertencer a um artigo.
     */
    public function article(): HasOne
    {
        return $this->hasOne(Article::class, 'image_id', 'image_id');
    }
}
