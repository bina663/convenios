@extends('layouts.index')

@section('title', 'SAGCP | Convênios')

@section('content')

<div class="content">

    <h1>Área Administrativa</h1>
    <p class="sub">Gestão do sistema, usuários, integrações e KPIs.</p>

    <!-- DASHBOARD -->
    <div class="box">
        <h2><i class="fa-solid fa-chart-line"></i> Dashboard</h2>
        <div class="admin-cards">
            <div class="admin-card">
                <i class="fa-solid fa-users"></i>
                <div>
                    <small>Usuários Ativos</small>
                    <h3>152</h3>
                </div>
            </div>
            <div class="admin-card">
                <i class="fa-solid fa-user-shield"></i>
                <div>
                    <small>Permissões Alteradas</small>
                    <h3>23</h3>
                </div>
            </div>
            <div class="admin-card">
                <i class="fa-solid fa-file-lines"></i>
                <div>
                    <small>Logs Recentes</small>
                    <h3>48</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- GESTÃO DE USUÁRIOS -->
    <div class="box">
        <h2><i class="fa-solid fa-user-cog"></i> Gestão de Usuários</h2>

        <a href="#" class="btn"><i class="fa-solid fa-user-plus"></i> Criar Usuário</a>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Permissão</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Isabela Moonlight</td>
                    <td>isabela@email.com</td>
                    <td>Admin</td>
                    <td>Ativo</td>
                    <td>
                        <a class="btn small"><i class="fa-solid fa-edit"></i> Editar</a>
                        <a class="btn small"><i class="fa-solid fa-user-slash"></i> Desativar</a>
                        <a class="btn small"><i class="fa-solid fa-key"></i> Resetar Senha</a>
                    </td>
                </tr>
                <tr>
                    <td>João Silva</td>
                    <td>joao@email.com</td>
                    <td>Usuário</td>
                    <td>Ativo</td>
                    <td>
                        <a class="btn small"><i class="fa-solid fa-edit"></i> Editar</a>
                        <a class="btn small"><i class="fa-solid fa-user-slash"></i> Desativar</a>
                        <a class="btn small"><i class="fa-solid fa-key"></i> Resetar Senha</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- CONFIGURAÇÃO DE INTEGRAÇÕES -->
    <div class="box">
        <h2><i class="fa-solid fa-plug"></i> Configuração de Integrações</h2>
        <div class="form-grid">
            <div>
                <label>API Key</label>
                <input type="text" placeholder="Digite a chave da API">
            </div>
            <div>
                <label>Endpoint</label>
                <input type="text" placeholder="URL da API">
            </div>
            <div style="grid-column: 1 / -1;">
                <label>Mapeamento de Dados</label>
                <textarea placeholder="Defina o mapeamento e regras de validação"></textarea>
            </div>
        </div>
        <button class="btn"><i class="fa-solid fa-save"></i> Salvar Integração</button>
    </div>

    <!-- GERAÇÃO / APLICAÇÃO AUTOMÁTICA -->
    <div class="box">
        <h2><i class="fa-solid fa-robot"></i> Geração / Aplicação Automática</h2>
        <div class="form-grid">
            <div>
                <label>Agendamento</label>
                <input type="datetime-local">
            </div>
            <div style="grid-column: 1 / -1;">
                <label>Regras de Atualização</label>
                <textarea placeholder="Defina regras para atualização automática de convênios"></textarea>
            </div>
        </div>
        <button class="btn"><i class="fa-solid fa-play"></i> Salvar Agendamento</button>
    </div>

    <!-- KPIs POR USUÁRIO -->
    <div class="box">
        <h2><i class="fa-solid fa-chart-simple"></i> KPIs por Usuário</h2>
        <div class="admin-cards">
            <div class="admin-card">
                <i class="fa-solid fa-user"></i>
                <div>
                    <small>Acessos</small>
                    <h3>120</h3>
                </div>
            </div>
            <div class="admin-card">
                <i class="fa-solid fa-edit"></i>
                <div>
                    <small>Atualizações</small>
                    <h3>45</h3>
                </div>
            </div>
            <div class="admin-card">
                <i class="fa-solid fa-users"></i>
                <div>
                    <small>Uso do Sistema</small>
                    <h3>80%</h3>
                </div>
            </div>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Acessos</th>
                    <th>Atualizações</th>
                    <th>Uso do Sistema</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Isabela Moonlight</td>
                    <td>120</td>
                    <td>30</td>
                    <td>90%</td>
                </tr>
                <tr>
                    <td>João Silva</td>
                    <td>95</td>
                    <td>15</td>
                    <td>70%</td>
                </tr>
            </tbody>
        </table>
    </div>

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
