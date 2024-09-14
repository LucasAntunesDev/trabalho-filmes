<?php

namespace App\Http\Controllers;


use App\Models\Filme;
use Illuminate\Http\Request;

class FilmesController extends Controller {
    public function index(Request $request) {
        $query = Filme::query();
    
        if ($request->filled('ano')) {
            $query->where('ano', $request->ano);
        }
    
        if ($request->filled('categoria')) {
            $query->where('categoria', 'like', '%' . $request->categoria . '%');
        }
    
        $dados = $query->get();
    
        return view('filmes.index', [
            'filmes' => $dados,
        ]);
    }
    

    public function cadastrar() {
        return view('filmes.cadastrar');
    }

    public function gravar(Request $form) {
        if ($form->file('capa')) $img = $form->file('capa')->store('filmes', 'imagens');

        $dados = $form->validate([
            'nome' => 'required',
            'sinopse' => 'required|string',
            'ano' => 'required|integer',
            'categoria' => 'required',
            'link_trailer' => 'required|string',
        ]);

        if ($form->file('capa')) $dados['capa'] = $img;

        Filme::create($dados);

        return redirect()->route('filmes')->with('sucesso', 'Filme cadastrado com sucesso');
    }

    public function editar(Filme $filme) {
        return view('filmes.editar', ['filme' => $filme]);
    }

    public function editarGravar(Request $form, Filme $filme) {

        if ($form->file('capa')) $img = $form->file('capa')->store('filmes', 'imagens');

        $dados = $form->validate([
            'nome' => 'required',
            'sinopse' => 'required|string',
            'ano' => 'required',
            'categoria' => 'required',
            'link_trailer' => 'required|string',
        ]);

        if ($form->file('capa')) $dados['capa'] = $img;

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
