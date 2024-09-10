@extends('base')

@section('titulo', 'Apagar | Filmes')

@section('conteudo')
<p>Tem certeza que quer apagar?</p>
<p><em>{{ $filme['nome'] }}</em></p>

<form action="{{ route('animais.apagar', $filme['id']) }}" method="post">
@method('delete')
@csrf

<input type="submit" value="Pode apagar sem medo" class="bg-red-500 text-white">

</form>

<a href="{{ route('animais') }}">Cancelar</a>
@endsection