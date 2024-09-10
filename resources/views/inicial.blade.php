@extends('base')

@section('titulo', 'Página inicial')

@section('conteudo')
<p class="mx-auto w-fit">Sejam bem-vindos à página inicial do início</p>

@if (Auth::user())
{{ Auth::user()['name'] }}
@else
Você não está autenticado
@endif

@endsection
