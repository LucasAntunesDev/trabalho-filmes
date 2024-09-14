@extends('base')

@section('titulo', 'Filmes')

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

@if (Auth::user() && Auth::user()->admin)
<a href="{{ route('filmes.cadastrar') }}" class="btn-success w-fit mx-auto my-8 block">
    Cadastrar filme
</a>
@endif

<form method="GET" action="{{ url('/filmes') }}" class="w-fit mx-auto flex items-center gap-x-2 my-4">
    <div class="flex flex-col">
        <label for="ano" class="label">Ano</label>
        <input type="text" name="ano" placeholder="Buscar por ano" value="{{ request('ano') }}" class="input">
    </div>

    <div class="flex flex-col">
        <label for="categoria" class="label">Categoria</label>
        <input type="text" name="categoria" placeholder="Buscar por categoria" value="{{ request('categoria') }}" class="input">
    </div>

    <button type="submit" class="btn-ghost inline-flex items-center gap-x-2 py-3 px-8 ml-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z" clip-rule="evenodd" />
        </svg>
        Buscar
    </button>
</form>

<main class="flex flex-wrap w-screen px-24 gap-y-10 ga h-fit gap-x-40 my-8">

    @if (Auth::user() && Auth::user()->admin)
    @foreach ($filmes as $filme)

    <div class="rounded-2xl w-[24rem] flex flex-col">
        <div class="flex gap-x-4 items-center w-fit mx-auto my-6">
            <a href="{{route('filmes.editar', $filme->id)}}" class="btn-success inline-flex gap-x-2">
                Editar
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>
            </a>
            <a href="{{route('filmes.apagar', $filme->id)}}" class="btn-danger inline-flex gap-x-2">
                Excluir
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </a>
        </div>

        @if ($filme->capa !== null)
        <img src="{{ asset("img/$filme->capa") }}" class="rounded-xl w-[20rem] h-fit mx-auto my-2" />

        @else
        <img src="https://archive.org/download/placeholder-image/placeholder-image.jpg" class="rounded w-full h-fit" />
        @endif

        <p class="font-bold text-xl">{{$filme->nome}}</p>
        <p class="text-sm text-zinc-50/90">{{$filme->ano}}</p>

        <p class="flex w-full h-fit overflow-ellipsis my-4">{{$filme->sinopse}}</p>

        <span class="bg-neutral-600 p-2 rounded-2xl text-zinc-50 w-fit my-2 text-sm">{{$filme->categoria}}</span>
        <a href="{{$filme->link_trailer}}" class="underline mx-auto" target="__blank">Ver trailer</a>

    </div>
    @endforeach
    @else
    @foreach ($filmes as $filme)
    <div id="default-modal#{{$filme->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-fit max-h-full bg-neutral-800/70 backdrop hover:cursor-pointer">
        <div class="bg-neutral-900 p-4 max-w-[40rem] rounded-2xl">

            <button type="button" data-modal-hide="default-modal#{{$filme->id}}" class="size-5  hover:text-zinc-50/80 my-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>

            @if ($filme->capa !== null)
            <img src="{{ asset("img/$filme->capa") }}" class="rounded-xl w-inheirt h-fit mx-auto" />
            @else
            <img src="https://archive.org/download/placeholder-image/placeholder-image.jpg" class="rounded w-full h-fit" />
            @endif

            <p class="font-bold text-xl">{{$filme->nome}}</p>
            <p class="text-sm text-zinc-50/90">{{$filme->ano}}</p>

            <p class="flex w-full max-h-40 h-fit overflow-ellipsis my-4">{{$filme->sinopse}}</p>

            <span class="bg-neutral-600 p-2 rounded-2xl text-zinc-50 w-fit my-2 text-sm">{{$filme->categoria}}</span>
            <a href="{{$filme->link_trailer}}" class="underline flex mx-auto w-fit my-4" target="__blank">Ver trailer</a>
        </div>
    </div>

    <button type=button' class="h-fit rounded-md hover:opacity-95 hover:cursor-pointer w-[20rem]" style="background: url('{{ asset("img/$filme->capa") }}'')" data-modal-target="default-modal#{{$filme->id}}" data-modal-toggle="default-modal#{{$filme->id}}">
        @if ($filme->capa !== null)
        <img src="{{ asset("img/$filme->capa") }}" class="rounded w-full h-fit" />
        <p class="font-bold text-xl text-start my-2">{{$filme->nome}}</p>
        @else
        <img src="https://archive.org/download/placeholder-image/placeholder-image.jpg" class="rounded w-full h-fit" />
        <p class="font-bold text-xl text-start my-2">{{$filme->nome}}</p>
        @endif
    </button>
    @endforeach
    @endif

</main>

@endsection
