<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Integracao;
use App\Models\IntegracaoEndpoint;

class IntegracaoController extends Controller
{
    public function create()
    {
        return view('admin.integracoes.config');
    }

    public function store(Request $request)
    {
        $api = Integracao::create([
            'nome' => $request->nome,
            'base_url' => $request->base_url,
            'status' => 'ativo',
            'auth_type' => $request->auth_type,
            'token' => $request->token,
        ]);

        foreach ($request->endpoints as $endpoint) {
            IntegracaoEndpoint::create([
                'integracao_id' => $api->id,
                'nome' => $endpoint['nome'],
                'endpoint' => $endpoint['endpoint'],
                'metodo' => $endpoint['metodo'],
            ]);
        }

        return redirect()->back()->with('success', 'Integração cadastrada!');
    }
}
