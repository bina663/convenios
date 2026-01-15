<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IntegracaoEndpoint extends Model
{
    protected $fillable = [
        'integracao_id', 'nome', 'endpoint', 'metodo', 'descricao', 'ativo'
    ];

    public function integracao()
    {
        return $this->belongsTo(Integracao::class);
    }
}
