@extends('layouts.index')

@section('title', 'SAGCP | Monitoramento')

@section('content')
<div class="content">

    <h1>Painel Financeiro e Alertas Inteligentes</h1>

    <!-- CARDS DE INDICADORES -->
    <div class="fin-cards">
        <div class="fin-card">
            <i class="fa-solid fa-coins"></i>
            <div>
                <small>Receitas Totais</small>
                <h3>R$ {{ number_format($cards['receitasTotais'], 2, ',', '.') }}</h3>
            </div>
        </div>

        <div class="fin-card">
            <i class="fa-solid fa-money-bill-trend-up"></i>
            <div>
                <small>Despesas Totais</small>
                <h3>R$ {{ number_format($cards['despesasTotais'], 2, ',', '.') }}</h3>
            </div>
        </div>

        <div class="fin-card">
            <i class="fa-solid fa-vault"></i>
            <div>
                <small>Saldo Atual</small>
                <h3>R$ {{ number_format($cards['saldoAtual'], 2, ',', '.') }}</h3>
            </div>
        </div>

        <div class="fin-card">
            <i class="fa-solid fa-file-invoice-dollar"></i>
            <div>
                <small>Pagamentos Pendentes</small>
                <h3>{{ $cards['pagamentosPendentes'] }}</h3>
            </div>
        </div>
    </div>

    <!-- FILTROS -->
    <form method="GET" class="filters" id="filtroForm">
        <select name="mes">
            <option value="">Mês</option>
            @foreach($mesesDisponiveis as $m)
                @php
                    $mesNome = match($m) {
                        '01' => 'Janeiro',
                        '02' => 'Fevereiro',
                        '03' => 'Março',
                        '04' => 'Abril',
                        '05' => 'Maio',
                        '06' => 'Junho',
                        '07' => 'Julho',
                        '08' => 'Agosto',
                        '09' => 'Setembro',
                        '10' => 'Outubro',
                        '11' => 'Novembro',
                        '12' => 'Dezembro',
                    };
                @endphp
                <option value="{{ $m }}" {{ request('mes') == $m ? 'selected' : '' }}>{{ $mesNome }}</option>
            @endforeach
        </select>

        <select name="ano">
            <option value="">Ano</option>
            @foreach($anosDisponiveis as $ano)
                <option value="{{ $ano }}" {{ request('ano') == $ano ? 'selected' : '' }}>{{ $ano }}</option>
            @endforeach
        </select>

        <select name="tipo">
            <option value="">Tipo</option>
            <option value="Receita" {{ request('tipo') == 'Receita' ? 'selected' : '' }}>Receitas</option>
            <option value="Despesa" {{ request('tipo') == 'Despesa' ? 'selected' : '' }}>Despesas</option>
        </select>

        <select name="status">
            <option value="">Status</option>
            <option value="Pago" {{ request('status') == 'Pago' ? 'selected' : '' }}>Pago</option>
            <option value="Pendente" {{ request('status') == 'Pendente' ? 'selected' : '' }}>Pendente</option>
        </select>
    </form>

    <!-- TABELA -->
    <table class="fin-table">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Categoria</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Data</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
            @foreach($pagamentos as $pagamento)
            <tr>
                <td>{{ $pagamento['descricao'] ?? '-' }}</td>
                <td>{{ $pagamento['tipo'] ?? '-' }}</td>
                <td>{{ $pagamento['categoria'] ?? '-' }}</td>
                <td>R$ {{ number_format($pagamento['valor'] ?? 0, 2, ',', '.') }}</td>
                <td><span class="status {{ strtolower($pagamento['status'] ?? '') }}">{{ $pagamento['status'] ?? '-' }}</span></td>
                <td>{{ isset($pagamento['data_pagamento']) ? date('d/m/Y', strtotime($pagamento['data_pagamento'])) : '-' }}</td>
                <td><a class="btn" href="#">Detalhar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script>
    // Filtros automáticos
    const form = document.getElementById('filtroForm');
    form.querySelectorAll('select').forEach(select => {
        select.addEventListener('change', () => form.submit());
    });
</script>

@endsection
