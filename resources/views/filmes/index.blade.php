@extends('base')

@section('titulo', 'Filmes')

@section('conteudo')

{{-- <div class="w-fit mx-auto">
    @if (session('sucesso'))
    <x-toast tipo="successo">
        {{ session('sucesso') }}
</x-toast>
@elseif(session('exclusão')
<x-toast tipo="exclusão">
    {{ session('exclusão') }}
</x-toast>
@endif
</div> --}}

<a href="{{ route('filmes.cadastrar') }}" class="btn-danger w-fit mx-auto my-8 block">
    Cadastrar filme
</a>


<main class="flex flex-wrap w-screen px-24 justify-center gap-4 h-fit gap-x-40 grid grid-col-1 md:grid-cols-4">

    @if (Auth::user() && Auth::user()->admin)
    @foreach ($filmes as $filme)

    <div class="rounded-2xl shadow-md w-[24rem] flex flex-col">
        <a href="{{route('filmes.editar', $filme->id)}}" class="inline-flex self-end bg-teal-600 p-2 size-10 rounded-full text-zinc-50 items-center gap-x-2 hover:bg-teal-700 my-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
            </svg>
        </a>
        <a href="{{route('filmes.apagar', $filme->id)}}" class="inline-flex self-end bg-rose-600 p-2 size-10 rounded-full text-zinc-50 items-center gap-x-2 hover:bg-rose-700 my-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
        </a>

        @if ($filme->imagem !== null)
        <img src="{{ asset("img/$filme->imagem") }}" class="rounded w-inheirt h-fit" />
        @else
        <img src="https://archive.org/download/placeholder-image/placeholder-image.jpg" class="rounded w-full h-fit" />
        @endif

        <p class="font-bold text-xl">{{$filme->nome}}</p>
        <p class="text-sm text-zinc-50/90">{{$filme->ano}}</p>

        <p class="flex w-72 max-h-40 h-fit overflow-ellipsis my-4">{{$filme->sinopse}}</p>

        <span class="bg-neutral-600 p-2 rounded-2xl text-zinc-50 w-fit my-2 text-sm">{{$filme->categoria}}</span>
        <a href="{{$filme->link_trailer}}" class="underline">Ver trailer</a>

    </div>
    @endforeach
    @else
    @foreach ($filmes as $filme)
    <div id="default-modal#{{$filme->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-neutral-800/70 backdrop">
        <div class="bg-neutral-800 max-w-[40rem] rounded-2xl">

            <button type="button" data-modal-hide="default-modal#{{$filme->id}}" class="size-5 self-end hover:text-zinc-50/80 my-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>

            @if ($filme->imagem !== null)
            <img src="{{ asset("img/$filme->imagem") }}" class="rounded w-inheirt h-fit" />
            @else
            <img src="https://archive.org/download/placeholder-image/placeholder-image.jpg" class="rounded w-full h-fit" />
            @endif

            <p class="font-bold text-xl">{{$filme->nome}}</p>
            <p class="text-sm text-zinc-50/90">{{$filme->ano}}</p>

            <p class="flex w-full max-h-40 h-fit overflow-ellipsis my-4">{{$filme->sinopse}}</p>

            <span class="bg-neutral-600 p-2 rounded-2xl text-zinc-50 w-fit my-2 text-sm">{{$filme->categoria}}</span>
            <a href="{{$filme->link_trailer}}" class="underline">Ver trailer</a>
        </div>
    </div>
    {{-- <a href="{{route('filme', $filme->id)}}"> --}}
    <button type=button' class="max-h-72 rounded-md hover:opacity-95 hover:cursor-pointer w-[20rem]" style="background: url('{{ asset("img/$filme->imagem") }}'')" data-modal-target="default-modal#{{$filme->id}}" data-modal-toggle="default-modal#{{$filme->id}}">
        @if ($filme->imagem !== null)
        <img src="{{ asset("img/$filme->imagem") }}" class="rounded w-full h-fit" />
        <p class="font-bold text-xl text-start my-2">{{$filme->nome}}</p>
        @else
        <img src="https://archive.org/download/placeholder-image/placeholder-image.jpg" class="rounded w-full h-fit" />
        <p class="font-bold text-xl text-start my-2">{{$filme->nome}}</p>
        @endif
    </button>
    {{-- </a> --}}
    @endforeach
    @endif

</main>

@endsection
