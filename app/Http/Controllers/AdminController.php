<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransfereGovService;

class AdminController extends Controller
{
    public function dashboard(TransfereGovService $api)
    {
        $programas   = collect($api->programas());
        $empenhos    = collect($api->empenhos());
        $pagamentos  = collect($api->pagamentos());
        $relatorios  = collect($api->relatorios());
        $pendencias  = collect($api->pendencias());

        // echo "<pre>";
        // var_dump($programas->take(5)); 
        // echo "</pre>";
        // exit;

        return view('admin.dashboard', [
            // CARDS
            'conveniosAtivos'      => $programas->count(),
            'conveniosFinalizados' => $relatorios->where('situacao_relatorio_gestao_novo', 'DISPONIBILIZADO')->count(),
            'conveniosPendentes'   => $pendencias->count(),

            'valorCaptado' => $empenhos->sum('valor_empenho'),
            'valorAReceber' => $pagamentos->where('status', '!=', 'Pago')->sum('valor'),

            // TABELAS
            'projetosRecentes' => $programas->take(5),
            // 'logsRecentes' => auth()->user()
            //     ? auth()->user()->logs()->latest()->take(5)->get()
            //     : []
        ]);
    }
    public function convenios(TransfereGovService $api){
        $programas   = collect($api->programas());

        return view('admin.convenios', [
            'convenios' => $programas,
        ]);
    }
    public function monitoramento(TransfereGovService $api){
        $monitoramentos = collect($api->monitoramento());
        return view('admin.monitoramento', [
            'monitoramentos' => $monitoramentos,
        ]);
    }

    public function integracoes(TransfereGovService $api){
        $status = $api->status();
        return view('admin.integracoes', [
            'status' => $status
        ]);
    }

}
