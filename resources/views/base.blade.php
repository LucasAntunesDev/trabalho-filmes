<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-neutral-800 text-zinc-50">

    <header class="bg-red-500 flex justify-between px-12 items-center h-fit w-screen py-4">
        
        <a href="{{ route('filmes') }}">Filmes</a>

        @if (Auth::user())
        Olá, {{ Auth::user()['name'] }}!
        @else
        Você não está autenticado
        <a href="{{ route('login') }}" class="bg-teal-600 transition ease-in-out rounded-full p-2">Login</a>
        @endif

    </header>

    <h1 class="mx-auto text-primary w-fit text-4xl font-bold my-6">@yield('titulo')</h1>

    @yield('conteudo')
</body>

</html>
