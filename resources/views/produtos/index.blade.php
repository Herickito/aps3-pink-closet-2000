@extends('layouts.app')

@section('title', 'Produtos | Pink Closet 2000')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <div class="page-title-eyebrow mb-1">Admin • Coleção</div>
        <h1 class="h4 mb-1">Produtos da Pink Closet 2000</h1>
        <p class="text-secondary mb-0">
            Cadastre peças, controle categorias e mantenha a vitrine virtual sempre atualizada.
        </p>
    </div>
    <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <a href="{{ route('produtos.create') }}" class="btn btn-y2k-primary">
            + Nova peça
        </a>
    </div>
</div>

{{-- Tabs Produtos / Categorias --}}
<div class="mb-3">
    <a href="{{ route('produtos.index') }}"
       class="y2k-chip-nav active me-2">
        <span class="dot"></span>
        Produtos
    </a>

    <a href="{{ route('categorias.index') }}"
       class="y2k-chip-nav">
        <span class="dot"></span>
        Categorias
    </a>
</div>

@if($ultimaCategoria)
    <div class="alert alert-info small mt-2">
        Cookie Y2K: última categoria acessada na vitrine foi
        <strong>{{ $ultimaCategoria }}</strong>.
    </div>
@endif

<div class="y2k-card mt-3">
    <div class="card-header y2k-card-header">
        <form method="GET" class="row g-2 align-items-end">
            <div class="col-md-5">
                <label class="form-label text-light">Filtrar por categoria</label>
                <select name="categoria_id"
                        class="form-select form-select-sm bg-dark text-light border-secondary">
                    <option value="">Todas as categorias</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}" @selected($categoriaId == $cat->id)>
                            {{ $cat->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-sm btn-y2k-outline w-100 mt-4 mt-md-0">
                    Filtrar
                </button>
            </div>
        </form>
    </div>

    <div class="card-body p-0">
        <table class="table table-dark table-hover mb-0 align-middle table-y2k">
            <thead>
            <tr>
                <th style="width: 80px;">Preview</th>
                <th>Peça</th>
                <th>Categoria</th>
                <th style="width: 140px;">Preço</th>
                <th class="text-end" style="width: 190px;">Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($produtos as $produto)
                <tr>
                    <td>
                        @if($produto->imagem)
                            <img src="{{ asset('storage/' . $produto->imagem) }}"
                                 alt="{{ $produto->nome }}"
                                 class="img-fluid rounded"
                                 style="max-width: 60px;">
                        @else
                            <span class="text-secondary small">Sem foto</span>
                        @endif
                    </td>
                    <td class="fw-semibold">
                        {{ $produto->nome }}
                    </td>
                    <td>
                        <span class="badge badge-y2k">
                            {{ $produto->categoria->nome ?? '-' }}
                        </span>
                    </td>
                    <td>
                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                    </td>
                    <td class="text-end">
                        <a href="{{ route('produtos.edit', $produto) }}"
                           class="btn btn-sm btn-outline-warning me-1">
                            Editar
                        </a>

                        <form action="{{ route('produtos.destroy', $produto) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Tem certeza que deseja excluir esta peça?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5"
                        class="text-center text-secondary py-4">
                        Nenhuma peça cadastrada ainda. Comece adicionando a primeira coleção! 💿✨
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer d-flex justify-content-end">
        {{ $produtos->withQueryString()->links() }}
    </div>
</div>
@endsection
