<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\TransfereGovService;
use App\Http\Controllers\Controller;

class Financeiro extends Controller
{
    private TransfereGovService $service;

    public function __construct(TransfereGovService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $mesSelecionado = $request->input('mes');   // 01, 02, ...
        $anoSelecionado = $request->input('ano');   // 2025, 2026
        $tipoSelecionado = $request->input('tipo'); // Receita ou Despesa
        $statusSelecionado = $request->input('status'); // Pago ou Pendente

        // 1️⃣ Pega todos os históricos de pagamentos
        $pagamentosRaw = collect($this->service->historico_pagamento_especial());

        // 2️⃣ Mapeia os dados para o formato do painel
        $pagamentos = $pagamentosRaw->map(function($item) {
            // Determina categoria pelo texto da descrição (opcional)
            $categoria = 'Outros';
            if (isset($item['descricao_historico_situacao_op'])) {
                $desc = strtolower($item['descricao_historico_situacao_op']);
                if (str_contains($desc, 'obra')) $categoria = 'Obra';
                else if (str_contains($desc, 'saúde')) $categoria = 'Saúde';
                else if (str_contains($desc, 'educação')) $categoria = 'Educação';
            }

            return [
                'descricao' => $item['descricao_historico_situacao_op'] ?? '-',
                'tipo' => 'Despesa', // A API de OP/OB é sempre despesa
                'categoria' => $categoria,
                'status' => $item['historico_situacao_op'] == 1 ? 'Pendente' : 'Pago',
                'valor' => $item['valor'] ?? 0,
                'data_pagamento' => $item['data_hora_historico_op'] ?? now(),
            ];
        });

        // 3️⃣ Meses e anos disponíveis para o filtro
        $mesesDisponiveis = $pagamentos->map(fn($p) => date('m', strtotime($p['data_pagamento'])))->unique()->sort();
        $anosDisponiveis = $pagamentos->map(fn($p) => date('Y', strtotime($p['data_pagamento'])))->unique()->sortDesc();

        // 4️⃣ Filtros
        if ($mesSelecionado) {
            $pagamentos = $pagamentos->filter(fn($p) => date('m', strtotime($p['data_pagamento'])) === $mesSelecionado);
        }
        if ($anoSelecionado) {
            $pagamentos = $pagamentos->filter(fn($p) => date('Y', strtotime($p['data_pagamento'])) === $anoSelecionado);
        }
        if ($tipoSelecionado) {
            $pagamentos = $pagamentos->filter(fn($p) => strcasecmp($p['tipo'], $tipoSelecionado) === 0);
        }
        if ($statusSelecionado) {
            $pagamentos = $pagamentos->filter(fn($p) => strcasecmp($p['status'], $statusSelecionado) === 0);
        }

        // 5️⃣ Calcula os cards
        $receitasTotais = $pagamentos->where('tipo', 'Receita')->sum('valor');
        $despesasTotais = $pagamentos->where('tipo', 'Despesa')->sum('valor');
        $saldoAtual = $receitasTotais - $despesasTotais;
        $pagamentosPendentes = $pagamentos->where('status', 'Pendente')->count();

        // 6️⃣ Retorna view
        return view('admin.financeiros', [
            'cards' => [
                'receitasTotais' => $receitasTotais,
                'despesasTotais' => $despesasTotais,
                'saldoAtual' => $saldoAtual,
                'pagamentosPendentes' => $pagamentosPendentes,
            ],
            'pagamentos' => $pagamentos,
            'mesesDisponiveis' => $mesesDisponiveis,
            'anosDisponiveis' => $anosDisponiveis,
        ]);
    }
}
