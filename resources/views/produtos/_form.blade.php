@csrf

<div class="mb-3">
    <label class="form-label">Nome da peça *</label>
    <input type="text"
           name="nome"
           class="form-control"
           value="{{ old('nome', $produto->nome ?? '') }}"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Descrição</label>
    <textarea name="descricao"
              class="form-control"
              rows="3">{{ old('descricao', $produto->descricao ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Preço *</label>
    <input type="number"
           name="preco"
           step="0.01"
           min="0"
           class="form-control"
           value="{{ old('preco', $produto->preco ?? '') }}"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Categoria *</label>
    <select name="categoria_id" class="form-select" required>
        <option value="">Selecione uma categoria</option>
        @foreach($categorias as $cat)
            <option value="{{ $cat->id }}"
                @selected(old('categoria_id', $produto->categoria_id ?? '') == $cat->id)>
                {{ $cat->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">
        Foto da peça (PNG/JPG, máx 2MB)
        @if(empty($produto?->imagem))
            *
        @endif
    </label>
    <input type="file" name="imagem" class="form-control">

    @if(!empty($produto?->imagem))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $produto->imagem) }}"
                 alt="{{ $produto->nome }}"
                 style="max-width: 120px;"
                 class="img-thumbnail">
        </div>
    @endif
</div>

<div class="mt-3 d-flex gap-2">
    <button class="btn btn-y2k-primary">
        Salvar peça
    </button>

    <a href="{{ route('produtos.index') }}" class="btn btn-y2k-outline">
        Cancelar
    </a>
</div>
