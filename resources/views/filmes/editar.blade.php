@extends('base')

@section('titulo', "Editar Filme")

@section('conteudo')

@if($errors->any())
<div>
    <h4>Deu ruim</h4>
    @foreach($errors->all() as $erro)
    <p>{{ $erro }}</p>
    @endforeach
</div>
@endif

<form method="post" enctype="multipart/form-data" action="{{ route('filmes.editar', $filme->id) }}" class="p-10 bg-neutral-700 rounded-2xl shadow-xl w-1/2 mx-auto">
    @csrf
    @method('put')

    <div>
        <label class="label" for="nome">Nome</label>
        <input class="input w-full h-fit" id="nome" name="nome" type="text" required="" placeholder="Nome" aria-label="Nome" value="{{ old('nome', $filme->nome ?? '' )}}">

    </div>

    <div>
        <label class="label" for="ano">Ano</label>
        <input class="input w-full h-fit" id="ano" name="ano" type="text" required="" placeholder="Ano" aria-label="Ano" value="{{ old('ano', $filme->ano ?? '' )}}">

    </div>

    <div>
        <label class="label" for="sinopse">sinopse</label>
        <textarea class="input w-full min-h-40 h-fit" id="sinopse" name="sinopse" type="text" required="" placeholder="sinopse" aria-label="sinopse">{{ old('sinopse', $filme->sinopse ?? '' )}}</textarea>
    </div>

    <div>
        <label class="label" for="link_trailer">Trailer</label>
        <input class="input w-full h-fit" id="link_trailer" name="link_trailer" type="text" required="" placeholder="link_trailer" aria-label="link_trailer" value="{{ old('link_trailer', $filme->link_trailer ?? '' )}}">

    </div>

    <div>
        <label class="label" for="categoria">Categoria</label>
        <input class="input w-full h-fit" id="categoria" name="categoria" type="text" required="" placeholder="categoria" aria-label="categoria" value="{{ old('categoria', $filme->categoria ?? '' )}}">

    </div>

    <div class="mt-2">
        <label class="label" for="imagem">Imagem</label>
        <input class="w-full px-5 py-1 text-zinc-50 bg-neutra1l-600 rounded" id="imagem" name="imagem" type="file" placeholder="Imagem" aria-label="Imagem" value="{{ old('imagem', $filme->imagem ?? '' )}}">
    </div>

    <div class="mt-6 flex w-fit gap-x-8 items-center mx-auto">
        <a href="{{route('filmes')}}">Cancelar</a>
        <button class="btn-success mx-auto" type="submit">
            Salvar
        </button>
    </div>

</form>

@endsection
