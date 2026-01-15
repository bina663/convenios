@extends('layouts.index')

@section('title', 'SAGCP | Monitoramento')

@section('content')
<div class="content">

    <h1>Oportunidades de Captação</h1>

    <!-- CARDS -->
    <div class="fin-cards">

        <div class="fin-card">
            <i class="fa-solid fa-bullhorn"></i>
            <div>
                <small>Editais Disponíveis</small>
                <h3>38</h3>
            </div>
        </div>

        <div class="fin-card">
            <i class="fa-solid fa-lightbulb"></i>
            <div>
                <small>Oportunidades Salvas</small>
                <h3>12</h3>
            </div>
        </div>

        <div class="fin-card">
            <i class="fa-solid fa-layer-group"></i>
            <div>
                <small>Categorias mapeadas</small>
                <h3>7</h3>
            </div>
        </div>

        <div class="fin-card">
            <i class="fa-solid fa-clock"></i>
            <div>
                <small>Vencendo em breve</small>
                <h3>5</h3>
            </div>
        </div>

    </div>

    <!-- FILTROS -->
    <div class="filters">

        <select>
            <option>Área Temática</option>
            <option>Saúde</option>
            <option>Infraestrutura</option>
            <option>Educação</option>
            <option>Cultura</option>
            <option>Social</option>
        </select>

        <select>
            <option>Situação</option>
            <option>Aberto</option>
            <option>Encerrado</option>
            <option>Em breve</option>
        </select>

        <select>
            <option>Origem</option>
            <option>Federal</option>
            <option>Estadual</option>
            <option>Municipal</option>
        </select>

    </div>

    <!-- TABELA DE OPORTUNIDADES -->
    <table class="fin-table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Área</th>
                <th>Origem</th>
                <th>Prazo Final</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>Programa de Modernização de Unidades Básicas de Saúde</td>
                <td>Saúde</td>
                <td>Federal</td>
                <td>20/12/2025</td>
                <td><span class="status aberto">Aberto</span></td>
                <td><a class="btn" href="detalhar-oportunidade.html">Detalhar</a></td>
            </tr>

            <tr>
                <td>Edital de Pavimentação Urbana</td>
                <td>Infraestrutura</td>
                <td>Estadual</td>
                <td>08/01/2026</td>
                <td><span class="status breve">Em breve</span></td>
                <td><a class="btn" href="detalhar-oportunidade.html">Detalhar</a></td>
            </tr>

            <tr>
                <td>Apoio a Projetos Culturais Regionais</td>
                <td>Cultura</td>
                <td>Municipal</td>
                <td>10/11/2025</td>
                <td><span class="status fechado">Encerrado</span></td>
                <td><a class="btn" href="detalhar-oportunidade.html">Detalhar</a></td>
            </tr>

        </tbody>
    </table>

</div>

@endsection