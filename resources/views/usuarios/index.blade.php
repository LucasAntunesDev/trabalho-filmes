@extends('base')

@section('titulo', 'Usuários')

@section('conteudo')

<div class="w-fit mx-auto">
    @if (session('sucesso'))
    <x-toast tipo="successo">
        {{ session('sucesso') }}
    </x-toast>
    @elseif(session('exclusão'))
    <x-toast tipo="exclusão">
        {{ session('exclusão') }}
    </x-toast>
    @endif
</div>

<a href="{{ route('usuarios.inserir') }}" class="btn-success w-fit mx-auto my-8 block">
    Cadastrar usuario
</a>


<main class="flex flex-wrap w-screen px-24 justify-center gap-4 h-fit gap-x-40">

    <div class="w-1/2 text-zinc-50">
        <table class="w-full">
            <thead class="bg-neutral-900">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">email</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Usuário</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Admin?</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm"></th>
                </tr>
            </thead>

            <tbody class="text-zinc-50">
                @foreach ($usuarios as $usuario)
                <tr @if($loop->even) class="bg-neutral-700" @endif>
                    <td class="w-1/3 text-left py-3 px-4">{{$usuario->name}}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{$usuario->email}}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{$usuario->username}}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{$usuario->admin ? 'Sim' : 'Não'}}</td>

                    <td class="w-fit text-left py-3 px-4  inline-flex justify-center">
                        <a href="{{route('usuarios.editar', $usuario->id)}}" class="btn-success">
                            Editar
                        </a>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>


</main>

@endsection
