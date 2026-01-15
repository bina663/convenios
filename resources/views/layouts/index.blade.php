<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
    <title>@yield('title')</title>
</head>
<body>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <span class="logo-text">SAGCP</span>
            <i class="fa-solid fa-bars toggle-btn" onclick="toggleSidebar()"></i>
        </div>

        <div class="sidebar-section-title">Operações</div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-item">
                <i class="fa-solid fa-chart-line"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.convenios') }}" class="sidebar-item">
                <i class="fa-solid fa-file-contract"></i>
                <span>Convênio</span>
            </a>

            <a href="{{ route('admin.monitoramento') }}" class="sidebar-item">
                <i class="fa-solid fa-folder-open"></i><span>Monitoramento</span>
            </a>

            <a href="{{ route('admin.integracoes') }}" class="sidebar-item">
                <i class="fa-solid fa-cogs"></i><span>Integrações</span>
            </a>

            <a href="{{ route('admin.trabalho-projetos') }}" class="sidebar-item">
                <i class="fa-solid fa-briefcase"></i><span>Trabalho/Projetos</span>
            </a>

            <a href="{{ route('admin.financeiros') }}" class="sidebar-item">
                <i class="fa-solid fa-money-bill-wave"></i><span>Financeiro</span>
            </a>

            <a href="{{ route('admin.propostas') }}" class="sidebar-item">
                <i class="fa-solid fa-file-lines"></i><span>Propostas</span>
            </a>

            <a href="{{ route('admin.oportunidades') }}" class="sidebar-item">
                <i class="fa-solid fa-lightbulb"></i><span>Oportunidades</span>
            </a>

        <div class="sidebar-section-title">Sistema</div>

            <a href="{{ route('auth.profile') }}" class="sidebar-item">
                <i class="fa-solid fa-user"></i><span>Perfil</span>
            </a>

            <a href="{{ route('admin.settings') }}" class="sidebar-item">
                <i class="fa-solid fa-users-gear"></i><span>Administração</span>
            </a>

            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
            <a href="#" class="sidebar-item"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Sair</span>
            </a>
    </div>


    @yield('content')


    <script>
        const toggleButton = document.getElementById('nav-toggle');
        const navLinks = document.getElementById('nav-links');

        toggleButton.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        
    </script>
</body>
</html>