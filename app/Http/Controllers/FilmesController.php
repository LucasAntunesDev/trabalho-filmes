<?php

namespace App\Http\Controllers;


use App\Models\Filme;
use Illuminate\Http\Request;

class FilmesController extends Controller {
    public function index(Request $request) {
        $dados = Filme::all();
        $query = Filme::query();

        // $filmesPorAno = Filme::groupBy('ano')->get();
        // if ($request->filled('ano')) $query->where('ano', 'like', '%' . $request->ano . '%');

        // dd($filmesPorAno);

        return view('filmes.index', [
            'filmes' => $dados,
        ]);
    }

    // public function filme(){


    //     return view('filmes.filme');
    // }

    public function cadastrar() {
        return view('filmes.cadastrar');
    }

    public function gravar(Request $form) {
        // dd($form);
        // dd($form->file('imagem'));
        if ($form->file('imagem')) $img = $form->file('imagem')->store('filmes', 'imagens');

        $dados = $form->validate([
            'nome' => 'required',
            'sinopse' => 'required|string',
            'ano' => 'required|integer',
            'categoria' => 'required',
            'link_trailer' => 'required|string',
        ]);

        if ($form->file('imagem')) $dados['imagem'] = $img;

        Filme::create($dados);

        return redirect()->route('filmes')->with('sucesso', 'Filme cadastrado com sucesso');
    }

    public function editar(Filme $filme) {
        return view('filmes.editar', ['filme' => $filme]);
    }

    public function editarGravar(Request $form, Filme $filme) {

        $img = $form->file('imagem')->store('filmes', 'imagens');

        $dados = $form->validate([
            'nome' => 'required',
            'sinopse' => 'required|string',
            'ano' => 'required',
            'categoria' => 'required',
            'link_trailer' => 'required|string',
        ]);

        $dados['imagem'] = $img;
        // dd($dados);

        $filme->fill($dados);

        $filme->save();

        return redirect()->route('filmes')->with('sucesso', 'Filme editado com sucesso');;
    }


    public function apagar(Filme $filme) {
        return view('filmes.apagar', [
            'filme' => $filme,
        ]);
    }

    public function deletar(Filme $filme) {
        $filme->delete();
        return redirect()->route('filmes')->with('exclusão', 'Filme excluído com sucesso');
    }
}
