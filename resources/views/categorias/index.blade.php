@extends('layouts.app')

@section('title', 'Categorias | Pink Closet 2000')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <div class="page-title-eyebrow mb-1">Admin • Organização</div>
        <h1 class="h4 mb-1">Categorias de peças</h1>
        <p class="text-secondary mb-0">
            Separe sua coleção por estilos: street, glam, Y2K, festa, casual e muito mais.
        </p>
    </div>
    <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <a href="{{ route('categorias.create') }}" class="btn btn-y2k-primary">
            + Nova categoria
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
       class="y2k-chip-nav active">
        <span class="dot"></span>
        Categorias
    </a>
</div>

<div class="y2k-card mt-3">
    <div class="card-body p-0">
        <table class="table table-dark table-hover mb-0 align-middle table-y2k">
            <thead>
            <tr>
                <th>Categoria</th>
                <th>Descrição</th>
                <th class="text-end" style="width: 180px;">Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categorias as $categoria)
                <tr>
                    <td class="fw-semibold">
                        {{ $categoria->nome }}
                    </td>
                    <td>
                        {{ $categoria->descricao }}
                    </td>
                    <td class="text-end">
                        <a href="{{ route('categorias.edit', $categoria) }}"
                           class="btn btn-sm btn-outline-warning me-1">
                            Editar
                        </a>

                        <form action="{{ route('categorias.destroy', $categoria) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?')">
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
                    <td colspan="3"
                        class="text-center text-secondary py-4">
                        Nenhuma categoria cadastrada. Comece criando “Blusas Y2K”, “Saias plissadas”, “Calças cargo”... 💗
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer text-end">
        {{ $categorias->links() }}
    </div>
</div>
@endsection
