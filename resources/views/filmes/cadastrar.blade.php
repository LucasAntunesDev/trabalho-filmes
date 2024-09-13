@extends('base')

@section('titulo', 'Cadastrar Filme')

@section('conteudo')


@if($errors->any())
<div>
    <h4>Deu ruim</h4>
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
    <a class="text-zinc-50/90" href="{{route('filmes')}}">Cadastrar filme</a>
</div>

<form method="post" enctype="multipart/form-data" action="{{ route('filmes.gravar') }}" class="p-10 bg-neutral-700 rounded-2xl shadow-xl w-1/2 mx-auto">
    @csrf

    <div>
        <label class="label" for="nome">Nome</label>
        <input class="input w-full" id="nome" name="nome" type="text" required="" placeholder="Nome" aria-label="Nome" value="{{ old('nome')}}">

    </div>

    <div>
        <label class="label" for="ano">Ano</label>
        <input class="input w-full" id="ano" name="ano" type="text" required="" placeholder="Ano" aria-label="Ano" value="{{ old('ano')}}">

    </div>

    <div>
        <label class="label" for="sinopse">sinopse</label>
        <textarea class="input w-full" id="sinopse" name="sinopse" type="text" required="" placeholder="sinopse" aria-label="sinopse">{{ old('sinopse')}}</textarea>
    </div>

    <div>
        <label class="label" for="link_trailer">Trailer</label>
        <input class="input w-full" id="link_trailer" name="link_trailer" type="text" required="" placeholder="link_trailer" aria-label="link_trailer" value="{{ old('link_trailer')}}">

    </div>

    <div>
        <label class="label" for="categoria">Categoria</label>
        <input class="input w-full" id="categoria" name="categoria" type="text" required="" placeholder="categoria" aria-label="categoria" value="{{ old('categoria')}}">

    </div>

    <div class="mt-2">
        <label class="label" for="imagem">Imagem</label>
        <input class="w-full px-5 py-1 text-zinc-50 bg-neutra1l-600 rounded" id="imagem" name="imagem" type="file" placeholder="Imagem" aria-label="Imagem" value="{{ old('imagem')}}">
    </div>

    <div class="mt-6 flex w-fit gap-x-8 items-center mx-auto">
        <a href="{{route('filmes')}}">Cancelar</a>
        <button class="btn-success mx-auto" type="submit">
            Salvar
        </button>
    </div>

</form>

@endsection
