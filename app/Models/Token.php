<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Token extends Model
{
    use HasFactory;

    protected $fillable = [
        'token_id', // Se não for auto-incremento
        'member_id',
        'expires',
        'purpose',
        // Adicione outros campos conforme necessário
    ];

    protected $primaryKey = 'token_id'; // Define a chave primária, se não for 'id'

    public $incrementing = false; // Se a chave primária não for auto-incremento
    protected $keyType = 'integer'; // Ou o tipo da sua chave primária

    /**
     * Define o relacionamento com o membro ao qual o token pertence (members).
     * Um token pertence a um membro.
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id', 'member_id');
    }
}
