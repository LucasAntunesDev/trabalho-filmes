@extends('base')

@section('titulo', "Editar Usuário")

@section('conteudo')

@if($errors->any())
<div class="mx-auto w-fit">
    <h4 class="text-rose-600 font-bold text-xl">Deu ruim</h4>
    @foreach($errors->all() as $erro)
    <p>{{ $erro }}</p>
    @endforeach
</div>
@endif

<div class="w-screen pl-10 text-zinc-50 flex items-center gap-x-4 my-8">
    <p>Início</p>
    <span class="font-bold">/</span>
    <a href="{{route('usuarios')}}">Usuários</a>
    <span class="font-bold">/</span>
    <a class="text-zinc-50/90" href="{{route('usuarios')}}">{{$usuario->name}}</a>
</div>

<form method="post" enctype="multipart/form-data" action="{{ route('usuarios.editar', $usuario->id) }}" class="p-10 bg-neutral-700 rounded-2xl shadow-xl w-1/2 mx-auto">
    @csrf
    @method('put')

    <div>
        <label class="label" for="name">Nome</label>
        <input type="text" name="name" id="name" placeholder="name" value="{{old('name', $usuario->name ?? '')}}" class="input w-full" />
    </div>

    <div class="my-4">
        <label class="label" for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="email" value="{{old('email', $usuario->email ?? '')}}" class="input w-full" />

    </div>


    <div class="my-4">
        <label class="label" for="username">Usuário</label>
        <input type="text" name="username" id="username" placeholder="username" value="{{old('username', $usuario->username ?? '')}}" class="input w-full" />
    </div>


    <div class="my-4">
        <label class="label" for="password">Senha</label>
        <input type="text" name="password" id="password" placeholder="password" value="" class="input w-full" />
    </div>


    <div class="my-4">
        <label class="label">É admin?</label>
        <div>
            <input type="radio" name="admin" id="true" placeholder="admin" value="1" {{$usuario->admin ? 'checked' : ''}} />
            <label for="true" true>Sim</label>
        </div>

        <div class="my-4">
            <input type="radio" name="admin" id="false" placeholder="admin" value="0" {{$usuario->admin ? '' : 'checked'}} />
            <label for="false" true>Não</label>
        </div>
    </div>

    <div class="mt-6 flex w-fit gap-x-8 items-center mx-auto">
        <a href="{{route('usuarios')}}">Cancelar</a>
        <button class="btn-success mx-auto" type="submit">
            Salvar
        </button>
    </div>

</form>

@endsection
