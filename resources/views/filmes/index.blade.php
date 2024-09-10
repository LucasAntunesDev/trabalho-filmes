@extends('base')

@section('titulo', 'Filmes')

@section('conteudo')

<p class="w-fit flex mx-auto my-8">
    <a href="{{ route('filmes.cadastrar') }}" class="px-4 py-1 text-white font-light tracking-wider bg-primary rounded">
        </i> Cadastrar filme
    </a>
</p>

@if (Auth::user() && Auth::user()->admin)
@foreach ($filmes as $filme)
<ul class="bg-neutral-700 p-4 rounded-2xl backdrop-blur-sm shadow-md w-fit  flex flex-col mx-auto">
    <li class="self-end my-2">
        <a href="{{route('filmes.editar', $filme->id)}}" class="inline-flex bg-teal-600 p-2 rounded-full text-zinc-50 items-center gap-x-2 hover:bg-teal-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
            </svg>
        </a>
    </li>

    <li><img src="{{ asset("img/$filme->imagem") }}" class="rounded" /></li>
    <li class="font-bold">{{$filme->nome}}</li>
    <li class="w-72">{{$filme->sinopse}}</li>
    <li>{{$filme->ano}}</li>
    <li class="bg-red-500/80 p-2 rounded-full text-zinc-50 w-fit">{{$filme->categoria}}</li>
    <li>{{$filme->link_trailer}}</li>

</ul>
@endforeach
@else
<section class="bg-red-500 w-screen grid grid-cols-1 md:grid-cols-4 justify-items-center h-fit">
    @foreach ($filmes as $filme)
    <div class="max-h-72 w-fit">
        <img src="{{ asset("img/$filme->imagem") }}" class="rounded" />
    </div>
    @endforeach
</section>
@endif


@endsection
