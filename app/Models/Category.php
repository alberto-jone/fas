<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', // Se não for auto-incremento
        'name',
        'description',
        'navigation',
        'seo_name',
        // Adicione outros campos conforme necessário
    ];

    protected $primaryKey = 'category_id'; // Define a chave primária, se não for 'id'

    public $incrementing = false; // Se a chave primária não for auto-incremento
    protected $keyType = 'integer'; // Ou o tipo da sua chave primária

    /**
     * Define o relacionamento com os artigos pertencentes a esta categoria (articles).
     * Uma categoria tem muitos artigos.
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'category_id', 'category_id');
    }
}
