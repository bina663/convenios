@extends('layouts.index')

@section('title', 'SAGCP | Monitoramento')

@section('content')

<div class="content">

    <h1>Perfil do Usuário</h1>
    <p class="sub">Atualize seus dados pessoais e preferências de notificação.</p>

    <!-- DADOS PESSOAIS -->
    <div class="box">
        <h2><i class="fa-solid fa-user"></i> Dados Pessoais</h2>

        <div class="form-grid">
            <div>
                <label>Foto de Perfil</label>
                <input type="file" accept="image/*">
            </div>
            <div>
                <label>Nome</label>
                <input type="text" value="Isabela Moonlight">
            </div>
            <div>
                <label>Email</label>
                <input type="email" value="isabela@email.com">
            </div>
            <div>
                <label>Cargo</label>
                <input type="text" value="Analista de Sistemas">
            </div>
        </div>

        <button class="btn"><i class="fa-solid fa-save"></i> Salvar Dados</button>
    </div>

    <!-- CONFIGURAÇÕES -->
    <div class="box">
        <h2><i class="fa-solid fa-gear"></i> Configurações</h2>

        <div class="form-grid">

            <!-- ALERTAS -->
            <div style="grid-column: 1 / -1;">
                <label>Alertas</label>
                <div class="select-wrapper">
                    <select>
                        <option>Ativar todos</option>
                        <option>Somente críticos</option>
                        <option>Desativar</option>
                    </select>
                </div>
            </div>

            <!-- PREFERÊNCIAS DE NOTIFICAÇÃO -->
            <div style="grid-column: 1 / -1;">
                <label>Preferências de Notificação</label>
                <div class="form-grid">
                    <div>
                        <label>Email</label>
                        <div class="select-wrapper">
                            <select>
                                <option>Ativar</option>
                                <option>Desativar</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>SMS</label>
                        <div class="select-wrapper">
                            <select>
                                <option>Ativar</option>
                                <option>Desativar</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label>Push</label>
                        <div class="select-wrapper">
                            <select>
                                <option>Ativar</option>
                                <option>Desativar</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CONSENTIMENTO LGPD -->
            <div style="grid-column: 1 / -1;">
                <label>Consentimento LGPD</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" checked> Aceito o tratamento dos meus dados conforme LGPD</label>
                </div>
            </div>

        </div>

        <button class="btn"><i class="fa-solid fa-save"></i> Salvar Configurações</button>
    </div>

</div>

@endsection