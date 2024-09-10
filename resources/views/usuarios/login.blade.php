@extends('base')

@section('titulo', 'Login')

@section('conteudo')

<p>Preencha o formulário</p>

@if($errors->any())
<div>
    <h4>Deu ruim</h4>
    @foreach($errors->all() as $erro)
    <p>{{ $erro }}</p>
    @endforeach
</div>
@endif

<form method="post" action="{{ route('login') }}" class="p-10 bg-neutral-700 rounded-2xl shadow-xl">
    @csrf

    <div>
        <label class="block text-sm text-zinc-50" for="username">Login</label>
        <input class="w-full px-5 py-1 text-zinc-50 bg-neutral-600 rounded" id="username" name="username" type="text" required="" placeholder="Usuário" aria-label="Usuário" value="{{ old('username')}}">

    </div>

    <div>
        <label class="block text-sm text-zinc-50" for="password">Senha</label>
        <input class="w-full px-5 py-1 text-zinc-50 bg-neutral-600 rounded" id="password" name="password" type="password" required="" placeholder="Senha" aria-label="Senha" value="{{ old('password')}}">

    </div>

    <div class="mt-6">
        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded gap-x-2 inline-flex items-center" type="submit">
            <i class="fas fa-save"></i>
            Gravar
        </button>
    </div>

</form>

@endsection
