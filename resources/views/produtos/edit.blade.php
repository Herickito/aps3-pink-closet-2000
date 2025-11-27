@extends('layouts.app')

@section('title', 'Editar peça | Pink Closet 2000')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <div class="page-title-eyebrow mb-1">Admin • Editar peça</div>
        <h1 class="h4 mb-1">Editar peça: {{ $produto->nome }}</h1>
        <p class="text-secondary mb-0">
            Ajuste informações, categoria ou foto dessa peça da coleção.
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
        <form action="{{ route('produtos.update', $produto) }}"
              method="POST"
              enctype="multipart/form-data">
            @method('PUT')
            @include('produtos._form', ['produto' => $produto])
        </form>
    </div>
</div>
@endsection
