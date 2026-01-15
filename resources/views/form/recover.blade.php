@extends('layouts.form')
@section('title', 'SAGCP | Esqueceu-se a senha')
@section('content')
    <div class="auth-container">
        
        <div id="recuperar" class="auth-box active">
            <h2>Recuperar Senha</h2>

            <p class="desc">Informe seu email para receber o link de redefinição da senha.</p>
            <label>Email</label>
            <input type="email" placeholder="seuemail@exemplo.com">

            <button class="btn-primary">Enviar Link</button>

            <div class="auth-links">
                <a href="/">Voltar ao login</a>
            </div>
        </div>
    </div>
@endsection
