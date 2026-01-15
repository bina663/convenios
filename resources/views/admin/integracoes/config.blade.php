@extends('layouts.index')

@section('title', 'Configurar Integração')

@section('content')

<div class="content">

    <h1>Configurar Integração</h1>
    <p class="sub">Cadastre APIs externas e seus endpoints</p>
    @if ($errors->any())
        <div style="
            background: #fa2e2e;
            border: 1px solid #ff4d4d;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            color: #ffb3b3;
        ">
            @foreach ($errors->all() as $error)
                <p style="margin: 0;">• {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('integracoes.store') }}" method="POST">
        @csrf

        <label>Nome da API</label>
        <input type="text" name="nome" required>

        <label>Base URL</label>
        <input type="text" name="base_url" placeholder="https://api.exemplo.com" required>

        <label>Tipo de Autenticação</label>
        <select name="auth_type">
            <option value="">Nenhuma</option>
            <option value="bearer">Bearer Token</option>
            <option value="api_key">API Key</option>
        </select>

        <label>Token / Chave</label>
        <input type="text" name="token">

        <h2>Endpoints</h2>

        <div id="endpoints"></div>

        <button type="button" class="btn" onclick="addEndpoint()">Adicionar Endpoint</button>

        <br><br>

        <button disabled type="submit" class="btn blue">Salvar Integração</button>

    </form>

</div>

<script>
function addEndpoint() {
    const container = document.getElementById('endpoints');

    const index = container.children.length;

    const div = document.createElement('div');
    div.classList.add('card');
    div.style.marginBottom = '15px';

    div.innerHTML = `
        <label>Nome</label>
        <input type="text" name="endpoints[${index}][nome]" required>

        <label>Endpoint</label>
        <input type="text" name="endpoints[${index}][endpoint]" placeholder="/usuarios" required>

        <label>Método</label>
        <select name="endpoints[${index}][metodo]">
            <option>GET</option>
            <option>POST</option>
            <option>PUT</option>
            <option>DELETE</option>
        </select>

        <button type="button" class="btn red" onclick="this.parentElement.remove()">Remover</button>
    `;

    container.appendChild(div);
}
</script>

@endsection
