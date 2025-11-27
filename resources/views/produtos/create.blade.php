@extends('layouts.app')

@section('title', 'Nova peça | Pink Closet 2000')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <div class="page-title-eyebrow mb-1">Admin • Nova peça</div>
        <h1 class="h4 mb-1">Cadastrar nova peça</h1>
        <p class="text-secondary mb-0">
            Adicione uma peça com foto, categoria e preço para deixar a vitrine ainda mais glamourosa. ✨
        </p>
    </div>
    <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <a href="{{ route('produtos.index') }}" class="btn btn-y2k-outline">
            Voltar para lista
        </a>
    </div>
</div>

<div class="mb-3">
    <a href="{{ route('produtos.index') }}"
       class="y2k-chip-nav me-2">
        <span class="dot"></span>
        Produtos
    </a>

    <a href="{{ route('categorias.index') }}"
       class="y2k-chip-nav">
        <span class="dot"></span>
        Categorias
    </a>
</div>

<div class="y2k-card mt-3">
    <div class="card-body">
        <form action="{{ route('produtos.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @include('produtos._form')
        </form>
    </div>
</div>
@endsection
