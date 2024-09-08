<?php

namespace App\Http\Controllers;


use App\Models\Filme;
use Illuminate\Http\Request;

class FilmesController extends Controller {
    public function index() {
        $dados = Filme::all();

        return view('filmes.index', [
            'filmes' => $dados,
        ]);
    }

    public function cadastrar() {
        return view('filmes.cadastrar');
    }

    public function gravar(Request $form) {
        // dd($form);

        $img = $form->file('imagem')->store('filmes', 'imagens');

        $dados = $form->validate([
            'nome' => 'required',
            'sinopse' => 'required|string',
            'ano' => 'required',
            'categoria' => 'required',
            'link_trailer' => 'required|string',
        ]);

        $dados['imagem'] = $img;

        dd($dados);

        Filme::create($dados);

        return redirect()->route('filmes');
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

        return redirect()->route('filmes');
    }



    public function apagar(Filme $filme) {
        return view('filmes.apagar', [
            'filme' => $filme,
        ]);
    }

    public function deletar(Filme $filme) {
        $filme->delete();
        return redirect()->route('filmes');
    }
}
