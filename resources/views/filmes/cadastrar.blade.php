@extends('base')

@section('titulo', 'Cadastrar | Filmes')

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

<form method="post" enctype="multipart/form-data" action="{{ route('filmes.gravar') }}" class="p-10 bg-neutral-700 rounded-2xl shadow-xl">
    @csrf

    <div>
        <label class="block text-sm text-zinc-50" for="nome">Nome</label>
        <input class="w-full px-5 py-1 text-zinc-50 bg-neutral-600 rounded" id="nome" name="nome" type="text" required="" placeholder="Nome" aria-label="Nome" value="{{ old('nome')}}">

    </div>

    <div>
        <label class="block text-sm text-zinc-50" for="ano">Ano</label>
        <input class="w-full px-5 py-1 text-zinc-50 bg-neutral-600 rounded" id="ano" name="ano" type="text" required="" placeholder="Ano" aria-label="Ano" value="{{ old('ano')}}">

    </div>

    <div>
        <label class="block text-sm text-zinc-50" for="sinopse">sinopse</label>
        <textarea class="w-full px-5 py-1 text-zinc-50 bg-neutral-600 rounded" id="sinopse" name="sinopse" type="text" required="" placeholder="sinopse" aria-label="sinopse">{{ old('sinopse')}}</textarea>
    </div>

    <div>
        <label class="block text-sm text-zinc-50" for="link_trailer">Trailer</label>
        <input class="w-full px-5 py-1 text-zinc-50 bg-neutral-600 rounded" id="link_trailer" name="link_trailer" type="text" required="" placeholder="link_trailer" aria-label="link_trailer" value="{{ old('link_trailer')}}">

    </div>

    <div>
        <label class="block text-sm text-zinc-50" for="categoria">Categoria</label>
        <input class="w-full px-5 py-1 text-zinc-50 bg-neutral-600 rounded" id="categoria" name="categoria" type="text" required="" placeholder="categoria" aria-label="categoria" value="{{ old('categoria')}}">

    </div>

    <div class="mt-2">
        <label class="block text-sm text-zinc-50" for="imagem">Imagem</label>
        <input class="w-full px-5 py-1 text-zinc-50 bg-neutra1l-600 rounded" id="imagem" name="imagem" type="file" placeholder="Imagem" aria-label="Imagem" value="{{ old('imagem')}}">
    </div>

    <div class="mt-6">
        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded gap-x-2 inline-flex items-center" type="submit">
            <i class="fas fa-save"></i>
            Gravar
        </button>
    </div>

</form>

@endsection
