<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $categoriaId = $request->query('categoria_id');

        if ($categoriaId) {
            $produtos = Produto::with('categoria')
                ->where('categoria_id', $categoriaId)
                ->orderBy('nome')
                ->paginate(10);

            $categoria = Categoria::find($categoriaId);
            if ($categoria) {
                // grava em cookie a última categoria acessada
                cookie()->queue('ultima_categoria', $categoria->nome, 60 * 24 * 30); // 30 dias
            }
        } else {
            $produtos = Produto::with('categoria')
                ->orderBy('nome')
                ->paginate(10);
        }

        $categorias      = Categoria::orderBy('nome')->get();
        $ultimaCategoria = $request->cookie('ultima_categoria');

        return view('produtos.index', compact('produtos', 'categorias', 'categoriaId', 'ultimaCategoria'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome'         => ['required', 'min:2', 'max:255'],
            'descricao'    => ['nullable', 'max:5000'],
            'preco'        => ['required', 'numeric', 'min:0'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'imagem'       => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
        ]);

        // upload da imagem
        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('produtos', 'public');
            $dados['imagem'] = $path;
        }

        Produto::create($dados);

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, Produto $produto)
    {
        $dados = $request->validate([
            'nome'         => ['required', 'min:2', 'max:255'],
            'descricao'    => ['nullable', 'max:5000'],
            'preco'        => ['required', 'numeric', 'min:0'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'imagem'       => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
        ]);


        if ($request->hasFile('imagem')) {
            if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
                Storage::disk('public')->delete($produto->imagem);
            }

            $path = $request->file('imagem')->store('produtos', 'public');
            $dados['imagem'] = $path;
        }

        $produto->update($dados);

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
            Storage::disk('public')->delete($produto->imagem);
        }

        $produto->delete();

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto excluído com sucesso!');
    }
}
