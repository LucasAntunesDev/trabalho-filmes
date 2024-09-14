@extends('base')

@section('titulo', 'Apagar Filme')

@section('conteudo')

<div class="w-screen pl-10 text-zinc-50 flex items-center gap-x-4 my-8">
    <p>Início</p>
    <span class="font-bold">/</span>
    <a href="{{route('filmes')}}">Filmes</a>
    <span class="font-bold">/</span>
    <p class="text-zinc-50/90">Excluir filme</p>
</div>

<p class="text-4xl font-bold mx-auto w-fit">Tem certeza que quer apagar?</p>
<p class="text-xl font-bold mx-auto w-fit text-zinc-50/90">{{ $filme['nome'] }}</p>

<form action="{{ route('filmes.apagar', $filme['id']) }}" method="post">
    @method('delete')
    @csrf

    <div class="flex items-center gap-x-4 w-fit mx-auto my-8">
        <a href="{{ route('filmes') }}">Cancelar</a>

        <button type="submit" class="btn-danger flex ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>

            Pode apagar sem medo
        </button>
    </div>

</form>

@endsection
