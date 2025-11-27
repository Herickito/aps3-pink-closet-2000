<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Pink Closet 2000')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Fontes --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Space+Grotesk:wght@400;600&display=swap"
        rel="stylesheet">
    <!-- Favicon Pink Closet 2000 -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">


    <style>
        :root {
            --y2k-pink: #ff4fa3;
            --y2k-pink-soft: #ffc4e0;
            --y2k-purple: #8b5cf6;
            --y2k-dark: #0f172a;
            --y2k-bg: #050816;
        }

        * {
            font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at 0% 0%, rgba(255, 192, 203, 0.28), transparent 55%),
                radial-gradient(circle at 100% 0%, rgba(139, 92, 246, 0.30), transparent 55%),
                radial-gradient(circle at 0% 100%, rgba(56, 189, 248, 0.20), transparent 55%),
                #050816;
            color: #e5e7eb;
        }

        .navbar-y2k {
            background: linear-gradient(90deg, #020617, #0b1120);
            border-bottom: 1px solid rgba(248, 113, 113, 0.3);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.9);
        }

        .navbar-brand {
            font-family: 'Space Grotesk', system-ui, sans-serif;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .brand-pill {
            background: radial-gradient(circle at 0 0, var(--y2k-pink) 0, var(--y2k-purple) 40%, #e5e7eb 100%);
            -webkit-background-clip: text;
            color: transparent;
            font-weight: 700;
        }

        .y2k-card {
            border-radius: 1.2rem;
            border: 1px solid rgba(248, 113, 113, 0.25);
            background:
                radial-gradient(circle at 0 0, rgba(255, 255, 255, 0.06), transparent 55%),
                radial-gradient(circle at 100% 0, rgba(139, 92, 246, 0.15), transparent 55%),
                rgba(15, 23, 42, 0.96);
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.95);
        }

        .y2k-card-header {
            border-bottom: 1px solid rgba(148, 163, 184, 0.35);
        }

        .y2k-chip-nav {
            display: inline-flex;
            align-items: center;
            padding: 0.3rem 0.9rem;
            border-radius: 999px;
            border: 1px solid rgba(248, 113, 113, 0.45);
            font-size: 0.8rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: #e5e7eb;
            gap: 0.4rem;
            background: radial-gradient(circle at 0 0, rgba(248, 113, 113, 0.35), transparent 60%);
            transition: all 0.15s ease-in-out;
        }

        .y2k-chip-nav span.dot {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: var(--y2k-pink-soft);
        }

        .y2k-chip-nav.active {
            background: linear-gradient(90deg, var(--y2k-pink), var(--y2k-purple));
            color: #020617;
            border-color: transparent;
        }

        .y2k-chip-nav:hover {
            transform: translateY(-1px) scale(1.02);
            text-decoration: none;
        }

        .btn-y2k-primary {
            border-radius: 999px;
            border: none;
            background: linear-gradient(135deg, var(--y2k-pink), var(--y2k-purple));
            box-shadow: 0 10px 25px rgba(248, 113, 113, 0.6);
            font-weight: 600;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            font-size: 0.75rem;
            color: #020617;
        }

        .btn-y2k-primary:hover {
            filter: brightness(1.06);
            transform: translateY(-1px);
        }

        .btn-y2k-outline {
            border-radius: 999px;
            border: 1px solid rgba(148, 163, 184, 0.8);
            color: #e5e7eb;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            background: transparent;
        }

        .btn-y2k-outline:hover {
            border-color: var(--y2k-pink);
            color: var(--y2k-pink-soft);
        }

        .table-y2k thead {
            background: radial-gradient(circle at 50% 0%, rgba(248, 113, 113, 0.2), transparent 60%);
        }

        .table-y2k thead th {
            border-bottom-color: rgba(148, 163, 184, 0.4);
            font-size: 0.78rem;
            letter-spacing: 0.09em;
            text-transform: uppercase;
            color: #e5e7eb;
        }

        .table-y2k tbody td {
            border-bottom-color: rgba(30, 64, 175, 0.6);
            font-size: 0.9rem;
        }

        .badge-y2k {
            border-radius: 999px;
            padding: 0.25rem 0.7rem;
            background: rgba(248, 113, 113, 0.18);
            border: 1px solid rgba(248, 113, 113, 0.6);
            color: var(--y2k-pink-soft);
            font-size: 0.7rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .page-title-eyebrow {
            font-size: 0.7rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--y2k-pink-soft);
        }

        .auth-wrapper {
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card-gradient {
            border-radius: 1.5rem;
            border: 1px solid rgba(248, 113, 113, 0.35);
            background:
                radial-gradient(circle at 0 0, rgba(255, 255, 255, 0.12), transparent 60%),
                radial-gradient(circle at 100% 0, rgba(236, 72, 153, 0.25), transparent 60%),
                rgba(15, 23, 42, 0.98);
            box-shadow: 0 30px 80px rgba(15, 23, 42, 0.95);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-y2k mb-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('produtos.index') }}">
            <img src="{{ asset('images/pink-closet-logo.svg') }}"
                alt="Pink Closet 2000"
                style="height: 34px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarMain">
            <ul class="navbar-nav me-3">
                @if(session('user_id'))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('produtos.*') ? 'text-light' : 'text-secondary' }}"
                           href="{{ route('produtos.index') }}">
                            Produtos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('categorias.*') ? 'text-light' : 'text-secondary' }}"
                           href="{{ route('categorias.index') }}">
                            Categorias
                        </a>
                    </li>
                @endif
            </ul>

            @if(session('user_name'))
                <span class="text-light me-3 small">
                    ✨ Bem-vinda(o), <strong>{{ session('user_name') }}</strong>
                </span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-y2k-outline">Sair</button>
                </form>
            @endif
        </div>
    </div>
</nav>

<div class="container mb-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Erros de validação:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')

    {{-- Música de fundo --}}
<audio id="bg-music" src="{{ asset('audio/pink-closet-theme.mp3') }}" loop></audio>

<style>
    .music-toggle {
        position: fixed;
        right: 1.5rem;
        bottom: 1.5rem;
        z-index: 9999;
        border-radius: 999px;
        border: 1px solid rgba(248, 113, 113, 0.6);
        background: radial-gradient(circle at 0 0, rgba(248, 113, 113, 0.4), transparent 60%);
        backdrop-filter: blur(14px);
        color: #f9fafb;
        padding: 0.45rem 0.9rem;
        font-size: 0.75rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        cursor: pointer;
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.95);
    }

    .music-toggle span.dot {
        width: 9px;
        height: 9px;
        border-radius: 999px;
        background: #22c55e;
    }

    .music-toggle.paused span.dot {
        background: #f97316;
    }

    .music-toggle:hover {
        transform: translateY(-1px) scale(1.02);
    }
</style>

<button type="button" id="music-toggle" class="music-toggle paused">
    <span class="dot"></span>
    <span class="label">Música OFF</span>
</button>

<script>
    (function () {
        const audio = document.getElementById('bg-music');
        const btn   = document.getElementById('music-toggle');

        if (!audio || !btn) return;

        const saved = localStorage.getItem('pinkClosetMusic') || 'off';

        if (saved === 'on') {

            btn.classList.remove('paused');
            btn.querySelector('.label').innerText = 'Música ON';
        }

        let isPlaying = (saved === 'on');
        let hasStarted = false;

        function updateVisual() {
            if (isPlaying) {
                btn.classList.remove('paused');
                btn.querySelector('.label').innerText = 'Música ON';
            } else {
                btn.classList.add('paused');
                btn.querySelector('.label').innerText = 'Música OFF';
            }
        }

        btn.addEventListener('click', async function () {
            try {
                if (!hasStarted) {
                    await audio.play();
                    hasStarted = true;
                    isPlaying = true;
                    localStorage.setItem('pinkClosetMusic', 'on');
                    updateVisual();
                    return;
                }

                if (isPlaying) {
                    audio.pause();
                    isPlaying = false;
                    localStorage.setItem('pinkClosetMusic', 'off');
                } else {
                    await audio.play();
                    isPlaying = true;
                    localStorage.setItem('pinkClosetMusic', 'on');
                }

                updateVisual();
            } catch (e) {
                console.warn('Não foi possível iniciar a música automaticamente:', e);
            }
        });

        updateVisual();
    })();
</script>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
