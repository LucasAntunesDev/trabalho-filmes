
@extends('base')

@section('titulo', 'Usuários')

@section('conteudo')

<ul>
    @foreach ($filmes as $filme)
    {{-- <li>{{$filme}}</li> --}}
    <li>{{$filme->nome}}</li>
    <li>{{$filme->sinopse}}</li>
    <li>{{$filme->ano}}</li>
    <li>{{$filme->categoria}}</li>
    <li>{{$filme->imagem}}</li>
    <li>{{$filme->link_trailer}}</li>
    @endforeach
</ul>

@endsection