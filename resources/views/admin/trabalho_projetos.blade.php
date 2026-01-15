
@extends('layouts.index')

@section('title', 'SAGCP | Monitoramento')

@section('content')
<div class="content">

    <h1>Projetos e Execução</h1>

    <a class="btn-add" href="projetos-form.html"><i class="fa-solid fa-plus"></i>Novo Projeto</a>

    <!-- Indicadores -->
    <div class="proj-cards">
        <div class="proj-card">
            <i class="fa-solid fa-clipboard-check"></i>
            <div class="info">
                <small>Total de Projetos</small>
                <h3>{{ $total }}</h3>
            </div>
        </div>

        <div class="proj-card">
            <i class="fa-solid fa-hammer"></i>
            <div class="info">
                <small>Em Execução</small>
                <h3>{{ $execucao  }}</h3>
            </div>
        </div>

        <div class="proj-card">
            <i class="fa-solid fa-file-contract"></i>
            <div class="info">
                <small>Em Licitação</small>
                <h3>{{ $licitacao }}</h3>
            </div>
        </div>

        <div class="proj-card">
            <i class="fa-solid fa-clock"></i>
            <div class="info">
                <small>Pendentes</small>
                <h3>{{ $pendentes }}</h3>
            </div>
        </div>

        <div class="proj-card">
            <i class="fa-solid fa-circle-exclamation"></i>
            <div class="info">
                <small>Impedido</small>
                <h3>{{ $impedido }}</h3>
            </div>
        </div>
    </div>

    <!-- Tabela -->
    <table class="proj-table">
        <thead>
            <tr>
                <th>Projeto</th>
                <th>Etapa Atual</th>
                <th>Responsável</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projetos as $projeto)
                <tr>
                    <td>{{ $projeto['codigo_plano_acao'] }}</td>
                    <td>{{ $projeto['situacao_plano_acao'] }}</td>
                    <td>{{ $projeto['nome_beneficiario_plano_acao'] }}</td>
                    <td>
                        @php
                            $statusClass = match($projeto['situacao_plano_acao']) {
                                'CIENTE' => 'execucao',
                                'PENDENTE' => 'pendente',
                                default => 'neutro'
                            };
                        @endphp

                        <span class="status {{ $statusClass }}">
                            {{ $projeto['situacao_plano_acao'] }}
                        </span>
                    </td>
                    <td>
                        <a class="btn" href="#">Detalhar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>

</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const filterAno = document.getElementById('filter-ano');
    const filterOrgao = document.getElementById('filter-orgao');
    const filterStatus = document.getElementById('filter-status');
    const table = document.querySelector('.monitor-table tbody');

    function filterTable() {
        const ano = filterAno.value.toLowerCase();
        const orgao = filterOrgao.value.toLowerCase();
        const status = filterStatus.value.toLowerCase();

        Array.from(table.rows).forEach(row => {
            const rowAno = row.dataset.ano.toLowerCase();
            const rowOrgao = row.dataset.orgao.toLowerCase();
            const rowStatus = row.dataset.status.toLowerCase();

            if (
                (ano === "" || rowAno.includes(ano)) &&
                (orgao === "" || rowOrgao.includes(orgao)) &&
                (status === "" || rowStatus.includes(status))
            ) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    filterAno.addEventListener('change', filterTable);
    filterOrgao.addEventListener('change', filterTable);
    filterStatus.addEventListener('change', filterTable);
});
</script>

@endsection