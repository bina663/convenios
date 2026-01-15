@extends('layouts.index')

@section('title', 'SAGCP | Monitoramento')

@section('content')

<div class="content">

    <h1>Propostas e Requerimentos</h1>

    <!-- CARDS DE INDICADORES -->
    <div class="fin-cards">

        <div class="fin-card">
            <i class="fa-solid fa-folder-open"></i>
            <div>
                <small>Total de Propostas</small>
                <h3>48</h3>
            </div>
        </div>

        <div class="fin-card">
            <i class="fa-solid fa-paper-plane"></i>
            <div>
                <small>Enviadas</small>
                <h3>22</h3>
            </div>
        </div>

        <div class="fin-card">
            <i class="fa-solid fa-circle-check"></i>
            <div>
                <small>Aprovadas</small>
                <h3>11</h3>
            </div>
        </div>

        <div class="fin-card">
            <i class="fa-solid fa-circle-exclamation"></i>
            <div>
                <small>Pendentes</small>
                <h3>7</h3>
            </div>
        </div>

    </div>

    <!-- FILTROS -->
    <div class="filters">
        <select>
            <option>Ano</option>
            <option>2025</option>
            <option>2024</option>
            <option>2023</option>
        </select>

        <select>
            <option>Esfera</option>
            <option>Federal</option>
            <option>Estadual</option>
            <option>Municipal</option>
        </select>

        <select>
            <option>Status</option>
            <option>Rascunho</option>
            <option>Enviada</option>
            <option>Aprovada</option>
            <option>Reprovada</option>
        </select>

        <a href="#" class="btn">+ Nova Proposta</a>
    </div>

    <!-- TABELA -->
    <table class="fin-table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Título</th>
                <th>Esfera</th>
                <th>Ano</th>
                <th>Status</th>
                <th>Última Atualização</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>2025-001</td>
                <td>Reforma da Praça Central</td>
                <td>Federal</td>
                <td>2025</td>
                <td><span class="status pendente">Em Análise</span></td>
                <td>05/12/2025</td>
                <td><a class="btn" href="detalhar-proposta.html">Detalhar</a></td>
            </tr>

            <tr>
                <td>2025-012</td>
                <td>Aquisição de Ambulância</td>
                <td>Estadual</td>
                <td>2025</td>
                <td><span class="status aprovado">Aprovada</span></td>
                <td>30/11/2025</td>
                <td><a class="btn" href="detalhar-proposta.html">Detalhar</a></td>
            </tr>

            <tr>
                <td>2024-087</td>
                <td>Pavimentação Bairro São Jorge</td>
                <td>Municipal</td>
                <td>2024</td>
                <td><span class="status enviado">Enviada</span></td>
                <td>12/10/2024</td>
                <td><a class="btn" href="detalhar-proposta.html">Detalhar</a></td>
            </tr>

        </tbody>
    </table>

</div>


@endsection