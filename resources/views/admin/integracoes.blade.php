@extends('layouts.index')

@section('title', 'SAGCP | Monitoramento')

@section('content')

<div class="content">

    <h1>Integrações Oficiais</h1>
    <p class="sub">Gerencie as conexões com os sistemas externos</p>

    <div class="cards-integracoes">

        <!-- CARD 1 -->
        <div class="card int-card">
            <i class="fa-solid fa-cloud-arrow-down"></i>

            <div class="info">
                <strong>Transferegov</strong>
                <span class="status 
                    {{ $status == 'Ativo' ? 'ativo' : '' }}
                    {{ $status == 'Inativo' ? 'erro' : '' }}
                ">
                    {{ $status }}
                </span>
            </div>

            <div class="actions">
                @if($status == 'Ativo')
                    <a class="btn blue" href="#">Sincronizar</a>
                
                @else
                    <a class="btn red" href="{{{ route('admin.transferegov.restart') }}}">Tentar novamente</a>
                @endif
                <a class="btn" href="{{{ route('admin.transferegov.config') }}}">Configurar</a>
                <a class="btn" href="#">Logs</a>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="card int-card">
            <i class="fa-solid fa-database"></i>

            <div class="info">
                <strong>SIGEF</strong>
                <span class="status neutro">Conexão via CSV</span>
            </div>

            <div class="actions">
                <a class="btn blue" href="#">Importar CSV</a>
                <a class="btn" href="#">Configurar</a>
                <a class="btn" href="#">Logs</a>
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="card int-card">
            <i class="fa-solid fa-hospital"></i>

            <div class="info">
                <strong>SISMOB</strong>
                <span class="status ativo">Ativo</span>
            </div>

            <div class="actions">
                <a class="btn blue" href="#">Sincronizar</a>
                <a class="btn" href="#">Configurar</a>
                <a class="btn" href="#">Logs</a>
            </div>
        </div>

        <!-- CARD 4 -->
        <div class="card int-card">
            <i class="fa-solid fa-school"></i>

            <div class="info">
                <strong>SIMEC</strong>
                <span class="status erro">Erro</span>
            </div>

            <div class="actions">
                <a class="btn red" href="#">Tentar novamente</a>
                <a class="btn" href="#">Configurar</a>
                <a class="btn" href="#">Logs</a>
            </div>
        </div>

    </div>

</div>

@endsection