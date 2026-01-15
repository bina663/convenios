@extends('layouts.index')

@section('title', 'SAGCP | Convênios')

@section('content')

<div class="content">

    <h1>Convênios</h1>
    <p>Gestão completa dos convênios da instituição. Filtre, acompanhe e detalhe cada convênio.</p>

    <!-- FILTROS -->
    <div class="filters">
        <select id="filter-ano">
            <option value="">Ano</option>
            @foreach(collect($convenios)->pluck('ano_programa')->unique() as $ano)
                <option value="{{ $ano }}">{{ $ano }}</option>
            @endforeach
        </select>
        <select id="filter-orgao">
            <option value="">Instituição</option>
            @foreach(collect($convenios)->pluck('nome_orgao_programa')->unique() as $orgao)
                <option value="{{ $orgao }}">{{ $orgao }}</option>
            @endforeach
        </select>
        <select id="filter-status">
            <option value="">Status</option>
            <option value="Ativo">Ativo</option>
            <option value="Pendente">Pendente</option>
        </select>
    </div>

    <!-- TABELA DE CONVÊNIOS -->
    <table class="covenio-table" id="convenio-table">
        <thead>
            <tr>
                <th>Convênio</th>
                <th>Instituição</th>
                <th>Valor Pactuado</th>
                <th>Valor Executado</th>
                <th>Vigência</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($convenios as $conv)
            @php
                $status = (($conv['valor_total_disponibilizado_programa'] ?? 0) > ($conv['valor_documentos_habeis_gerados_programa'] ?? 0)) ? 'Pendente' : 'Ativo';
            @endphp
            <tr data-ano="{{ $conv['ano_programa'] }}" data-status="{{ $status }}">
                <td>{{ $conv['codigo_programa'] ?? '-' }}</td>
                <td>{{ $conv['nome_orgao_programa'] ?? '-' }}</td>
                <td>R$ {{ number_format($conv['valor_total_disponibilizado_programa'] ?? 0, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($conv['valor_documentos_habeis_gerados_programa'] ?? 0, 2, ',', '.') }}</td>
                <td>
                    {{ optional($conv['data_inicio_ciencia_programa'])->format('d/m/Y') ?? '-' }} 
                    - 
                    {{ optional($conv['data_fim_ciencia_programa'])->format('d/m/Y') ?? '-' }}
                </td>
                <td class="status-col">
                    <span class="status {{ strtolower($status) }}">{{ $status }}</span>
                </td>
                <td>
                    <a class="btn small" href="#">Detalhar</a>
                    <a class="btn small" href="#">Renovar</a>
                    <a class="btn small" href="#">Encerrar</a>
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
    const table = document.getElementById('convenio-table').getElementsByTagName('tbody')[0];
    const loading = document.getElementById('loading');

    function filterTable() {

        const ano = filterAno.value.toLowerCase();
        const orgao = filterOrgao.value.toLowerCase();
        const status = filterStatus.value.toLowerCase();

        Array.from(table.rows).forEach(row => {
            const rowAno = row.dataset.ano.toLowerCase();
            const rowOrgao = row.cells[1].innerText.toLowerCase();
            const rowStatus = row.dataset.status.toLowerCase();

            if ((ano === "" || rowAno.includes(ano)) &&
                (orgao === "" || rowOrgao.includes(orgao)) &&
                (status === "" || rowStatus.includes(status))) {
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
