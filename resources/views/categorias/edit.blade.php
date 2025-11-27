@extends('layouts.app')

@section('title', 'Editar categoria | Pink Closet 2000')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <div class="page-title-eyebrow mb-1">Admin • Editar categoria</div>
        <h1 class="h4 mb-1">Editar categoria: {{ $categoria->nome }}</h1>
        <p class="text-secondary mb-0">
            Ajuste o nome ou descrição dessa categoria da coleção.
        </p>
    </div>
    <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <a href="{{ route('categorias.index') }}" class="btn btn-y2k-outline">
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
        <form action="{{ route('categorias.update', $categoria) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nome *</label>
                <input type="text" name="nome" class="form-control"
                       value="{{ old('nome', $categoria->nome) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3">
{{ old('descricao', $categoria->descricao) }}</textarea>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button class="btn btn-y2k-primary">Salvar alterações</button>
                <a href="{{ route('categorias.index') }}" class="btn btn-y2k-outline">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
