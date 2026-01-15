@extends('layouts.index')

@section('title', 'SAGCP | Dashboard')

@section('content')
<div class="content">

    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Dashboard</h1>

        <a href="" class="btn-report">
            <i class="fa-solid fa-file-pdf"></i> Gerar Relatório
        </a>
    </div>

    <!-- CARDS -->
    <div class="cards">

        <div class="card">
            <i class="fa-solid fa-building"></i>
            <div>
                <small>Convênios Ativos</small>
                <h3>{{ $conveniosAtivos ?? 0 }}</h3>
            </div>
        </div>

        <div class="card">
            <i class="fa-solid fa-check-circle"></i>
            <div>
                <small>Finalizados</small>
                <h3>{{ $conveniosFinalizados ?? 0 }}</h3>
            </div>
        </div>

        <div class="card">
            <i class="fa-solid fa-clock"></i>
            <div>
                <small>Pendentes</small>
                <h3>{{ $conveniosPendentes ?? 0 }}</h3>
            </div>
        </div>

        <div class="card">
            <i class="fa-solid fa-money-bill-wave"></i>
            <div>
                <small>Valor Captado</small>
                <h3>R$ {{ number_format($valorCaptado ?? 0, 2, ',', '.') }}</h3>
            </div>
        </div>

        <div class="card">
            <i class="fa-solid fa-piggy-bank"></i>
            <div>
                <small>Valor a Receber</small>
                <h3>Valor a Receber: R$ {{ number_format($valorAReceber, 2, ',', '.') }}</h3>
            </div>
        </div>
    </div>

    <!-- TABELA: Projetos Recentes -->
    <h2>Projetos Recentes</h2>
    <table>
        <thead>
            <tr>
                <th>Órgão Superior</th>
                <th>Órgão</th>
                <th>Modalidade</th>
                <th>Valor Total Disponibilizado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projetosRecentes ?? [] as $projeto)
                <tr>
                    <td>{{ $projeto['nome_orgao_superior_programa'] ?? '-' }}</td>
                    <td>{{ $projeto['nome_orgao_programa'] ?? '-' }}</td>
                    <td>{{ $projeto['modalidade_programa'] ?? '-' }}</td>
                    <td>R$ {{ number_format($projeto['valor_total_disponibilizado_programa'] ?? 0, 2, ',', '.') }}</td>
                </tr>


            @empty
                <tr>
                    <td colspan="4">Nenhum projeto encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- TABELA: Logs -->
    <h2 style="margin-top: 30px;">Logs Recentes</h2>
    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Ação</th>
                <th>Usuário</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($logsRecentes ?? [] as $log)
                <tr>
                    <td>{{ optional($log->created_at)->format('d/m/Y H:i') ?? '-' }}</td>
                    <td>{{ $log->acao ?? '-' }}</td>
                    <td>{{ $log->usuario ?? '-' }}</td>
                    <td>{{ $log->status ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum log encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
