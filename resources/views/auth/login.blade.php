@extends('layouts.app')

@section('title', 'Login | Pink Closet 2000')

@section('content')
<div class="auth-wrapper">
    <div class="row justify-content-center w-100">
        <div class="col-md-5">
            <div class="auth-card-gradient p-4 p-md-5">
                <div class="mb-3 text-center">
                    <div class="page-title-eyebrow mb-1">Admin • Acesso restrito</div>
                    <h1 class="h4 mb-2">Entrar no painel da Pink Closet 2000</h1>
                    <p class="text-secondary mb-0">
                        Gerencie a coleção, categorias e vitrine da sua loja fashion Y2K. 💿✨
                    </p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="mt-4">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Senha</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               required>
                    </div>

                    <button class="btn btn-y2k-primary w-100">
                        Acessar painel
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
