<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\IntegracaoEndpoint;
class Integracao extends Model
{

    protected $table = 'integracoes';
    protected $fillable = [
        'nome', 'base_url', 'status', 'auth_type', 'token', 'headers'
    ];

    protected $casts = [
        'headers' => 'array',
    ];

    public function endpoints()
    {
        return $this->hasMany(IntegracaoEndpoint::class);
    }
}
