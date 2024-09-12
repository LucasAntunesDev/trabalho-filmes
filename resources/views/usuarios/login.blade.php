@extends('base')

@section('titulo', 'Login')

@section('conteudo')

@if($errors->any())
<div>
    <h4>Deu ruim</h4>
    @foreach($errors->all() as $erro)
    <p>{{ $erro }}</p>
    @endforeach
</div>
@endif

<form method="post" action="{{ route('login') }}" class="p-10 bg-neutral-700 rounded-2xl shadow-xl w-1/2 mx-auto">
    @csrf

    <div>
        <label class="label" for="username">Login</label>
        <input class="input w-full" id="username" name="username" type="text" required="" placeholder="Usuário" aria-label="Usuário" value="{{ old('username')}}">

    </div>

    <div>
        <label class="label" for="password">Senha</label>
        <input class="input w-full" id="password" name="password" type="password" required="" placeholder="Senha" aria-label="Senha" value="{{ old('password')}}">

    </div>

    <div class="mt-6 w-fit mx-auto">
        <button class="btn-success inline-flex gap-x-2 items-center" type="submit">
            <span>Entrar</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
                <path d="M5 12h14" />
                <path d="m12 5 7 7-7 7" /></svg>
        </button>
    </div>

    <p class="mx-auto w-fit mt-4">Ainda não tem uma conta? <a href="#" class="font-bold underline">Cadastre-se</a></p>

</form>

@endsection
