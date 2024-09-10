<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller {
    public function index() {
        $usuarios = Usuario::orderBy('nome', 'asc')->get();

        return view('usuarios.index', ['usuarios' => $usuarios, 'pagina' => 'usuarios']);
    }

    public function create() {
        return view('usuarios.cadastrar');
    }

    public function insert(Request $form) {
        $dados = $form->validate([
            'nome' => 'required',
            'username' => 'required|min:3|unique:usuarios',
            'password' => 'required|min:3',
            'admin' => 'boolean',
        ]);

        $dados['password'] = Hash::make($dados['password']);

        Usuario::create($dados);

        return redirect()->route('usuarios');
    }

    public function editar(Usuario $username) {
        return view('filmes.editar', ['username' => $username]);
    }

    public function editarGravar(Request $form, Usuario $username) {

        $dados = $form->validate([
            'nome' => 'required',
            'username' => 'required|min:3|unique:usuarios',
            'password' => 'required|min:3',
            'admin' => 'boolean',
        ]);


        $username->fill($dados);

        $username->save();

        return redirect()->back();
    }

    public function login(Request $form) {


        if ($form->isMethod('POST')) {

            $credenciais = $form->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            if (Auth::attempt($credenciais)) {
                return redirect()->intended(route('index'));
            } else {
                return redirect()->route('login')->with('erro', 'Usuário ou senha inválidos');
            }
            // dd($credenciais);
        }

        return view('usuarios.login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }
}
