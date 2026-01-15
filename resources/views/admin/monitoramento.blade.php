
@extends('layouts.index')

@section('title', 'SAGCP | Monitoramento')

@section('content')
<div class="content">

    <h1>Monitoramento de Transferências</h1>

    <div class="filters">
        <select id="filter-ano">
            <option value="">Ano</option>
            @foreach(collect($monitoramentos)->pluck('ano_plano_acao')->unique() as $ano)
                <option value="{{ $ano }}">{{ $ano }}</option>
            @endforeach
        </select>

        <select id="filter-orgao">
            <option value="">Parlamentar</option>
            @foreach(collect($monitoramentos)->pluck('nome_parlamentar_emenda_plano_acao')->unique() as $orgao)
                <option value="{{ $orgao }}">{{ $orgao }}</option>
            @endforeach
        </select>

        <select id="filter-status">
            <option value="">Status</option>
            @foreach(collect($monitoramentos)->pluck('situacao_plano_acao')->unique() as $status)
                <option value="{{ $status }}">{{ $status }}</option>
            @endforeach
        </select>
    </div>

    <table class="monitor-table">
        <thead>
            <tr>
                <th>Convênio</th>
                <th>Órgão Concedente</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($monitoramentos as $monitoramento)
            <tr 
                data-ano="{{ $monitoramento['ano_plano_acao'] }}"
                data-orgao="{{ $monitoramento['nome_parlamentar_emenda_plano_acao'] }}"
                data-status="{{ $monitoramento['situacao_plano_acao'] }}"
            >
                <td>{{ $monitoramento['codigo_plano_acao'] }}</td>

                <td>{{ $monitoramento['nome_parlamentar_emenda_plano_acao'] }}</td>

                <td>
                    R$ {{ number_format(
                        $monitoramento['valor_custeio_plano_acao'] + $monitoramento['valor_investimento_plano_acao'],
                        2,
                        ',',
                        '.'
                    ) }}
                </td>

                <td>{{ $monitoramento['situacao_plano_acao'] }}</td>

                <td>
                    <a href="#">Detalhar</a>
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