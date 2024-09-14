@extends('base')

@section('titulo', "Editar Filme")

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
    <a href="{{route('filmes')}}">Filmes</a>
    <span class="font-bold">/</span>
    <a class="text-zinc-50/90" href="{{route('filmes')}}">{{$filme->nome}}</a>
</div>

<form method="post" enctype="multipart/form-data" action="{{ route('filmes.editar', $filme->id) }}" class="p-10 bg-neutral-700 rounded-2xl shadow-xl w-1/2 mx-auto">
    @csrf
    @method('put')

    <div class="my-4">
        <label class="label" for="nome">Nome</label>
        <input class="input w-full h-fit" id="nome" name="nome" type="text" required="" placeholder="Nome" aria-label="Nome" value="{{ old('nome', $filme->nome ?? '' )}}">

    </div>

    <div class="my-4">
        <label class="label" for="ano">Ano</label>
        <input class="input w-full h-fit" id="ano" name="ano" type="text" required="" placeholder="Ano" aria-label="Ano" value="{{ old('ano', $filme->ano ?? '' )}}">

    </div>

    <div class="my-4">
        <label class="label" for="sinopse">sinopse</label>
        <textarea class="input w-full min-h-40 h-fit" id="sinopse" name="sinopse" type="text" required="" placeholder="sinopse" aria-label="sinopse">{{ old('sinopse', $filme->sinopse ?? '' )}}</textarea>
    </div>

    <div class="my-4">
        <label class="label" for="link_trailer">Trailer</label>
        <input class="input w-full h-fit" id="link_trailer" name="link_trailer" type="text" required="" placeholder="link_trailer" aria-label="link_trailer" value="{{ old('link_trailer', $filme->link_trailer ?? '' )}}">

    </div>

    <div class="my-4">
        <label class="label" for="categoria">Categoria</label>
        <input class="input w-full h-fit" id="categoria" name="categoria" type="text" required="" placeholder="categoria" aria-label="categoria" value="{{ old('categoria', $filme->categoria ?? '' )}}">

    </div>

    <div class="mt-6">
        <div class="flex items-center justify-center w-full">
            <label for="capa" class="flex flex-col items-center justify-center w-full h-64 border-2 border-neutral-500 border-dashed rounded-lg cursor-pointer bg-neutral-800-50">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-neutral-5000" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-zinc-50"><span class="font-semibold">Clique aqui para fazer o upload da capa</span></p>
                </div>
                <input id="capa" name="capa" type="file" placeholder="capa" aria-label="capa" value="{{ old('capa', $filme->capa ?? '' )}}" class="hidden" />
            </label>
        </div>
    </div>

    <div class="mt-6 flex w-fit gap-x-8 items-center mx-auto">
        <a href="{{route('filmes')}}">Cancelar</a>
        <button class="btn-success mx-auto" type="submit">
            Salvar
        </button>
    </div>

</form>

@endsection
