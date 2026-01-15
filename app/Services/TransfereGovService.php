<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TransfereGovService
{
    private string $baseUrl = 'https://api.transferegov.gestao.gov.br/transferenciasespeciais';


    public function get(string $endpoint = '', array $params = [])
    {
        return Http::timeout(15)
            ->get($this->baseUrl . $endpoint, $params)
            ->json();
    }

    /** Status da api */
    public function status()
    {
        $status = $this->get();
        if (empty($status)) {
            $status = 'Inativo';
        } else {
            $status = 'Ativo';
        }
        return $status;
    }
    /** Convênios */
    public function programas()
    {
        return $this->get('/programa_especial');
    }
    /** Empenhos (valor captado) */
    public function empenhos()
    {
        return $this->get('/empenho_especial');
    }

    /** Pagamentos */
    public function pagamentos()
    {
        return $this->get('/historico_pagamento_especial');
    }

    /** Relatórios de gestão */
    public function relatorios()
    {
        return $this->get('/relatorio_gestao_novo_especial');
    }

    /** Pendências */
    public function pendencias()
    {
        return $this->get('/orgao_analise_pendente_especial');
    }


    public function ordem_pagamento_ordem_bancaria_especial()
    {
        // Faz a requisição GET para o endpoint específico
        return $this->get('/ordem_pagamento_ordem_bancaria_especial');
    }
    public function historico_pagamento_especial()
    {
        // Faz a requisição GET para o endpoint específico
        return $this->get('/historico_pagamento_especial');
    }


    //monitoramento
    public function monitoramento()
    {
        // Faz a requisição GET para o endpoint específico
        return $this->get('/plano_acao_especial');
    }


    public function endpointsDisponiveis()
    {
        return [
            'programas' => 'Programas',
            'empenhos' => 'Empenhos',
            'pagamentos' => 'Pagamentos',
            'relatorios' => 'Relatórios',
            'pendencias' => 'Pendências',
            'ordem_pagamento_ordem_bancaria_especial' => 'Ordens bancárias',
            'historico_pagamento_especial' => 'Histórico de pagamentos',
            'monitoramento' => 'Monitoramento',
        ];
    }

}