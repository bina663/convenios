@extends('layouts.form')
@section('title', 'Login')
@section('content')
    <div class="auth-container">
        <form action="/auth" method="POST">
            @csrf
            <div id="login" class="auth-box active">
                <h2>Entrar no SAGCP</h2>

                <label>Email</label>
                <input type="email" placeholder="seuemail@exemplo.com" name="email">

                <label>Senha</label>
                <input type="password" placeholder="Digite sua senha" name="password">

                <button class="btn-primary">Entrar</button>
                @if ($errors->any())
                    <div style="color: red;">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="auth-links">
                    <a href="/recover">Esqueci minha senha</a>
                </div>
            </div>
        </form>
    </div>
@endsection
