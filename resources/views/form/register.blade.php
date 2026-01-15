@extends('layouts.form')
@section('title', 'SAGCP | Login')
@section('content')
    <div class="auth-container">
        <form action="/register/true" method="POST">
            @csrf
            <div id="login" class="auth-box active">
                <h2>Registro no SAGCP</h2>

                <label>Email</label>
                <input type="email" placeholder="seuemail@exemplo.com" name="email">

                <label>Senha</label>
                <input type="password" placeholder="Digite sua senha" name="password">

                <button class="btn-primary">Entrar</button>

                <div class="auth-links">
                    <a href="/recover">Esqueci minha senha</a>
                </div>
            </div>
        </form>
    </div>
@endsection
