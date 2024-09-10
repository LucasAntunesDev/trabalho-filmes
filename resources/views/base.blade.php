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

    <header class="flex justify-between px-12 items-center h-fit w-screen py-4">

        <div class="inline-flex items-center gap-4 ">
            <a href="{{ route('index') }}">Início</a>

            <a href="{{ route('filmes') }}">Filmes</a>
        </div>


        @if (Auth::user())
        <div class="inline-flex items-center gap-4 ">
            <p>Olá, {{ Auth::user()['name'] }}!</p>
            <a href="{{ route('logout') }}" class="bg-rose-600 transition ease-in-out rounded-full p-2">Logout</a>
        </div>
        @else
        <div class="inline-flex items-center gap-4 ">
        <p>Você não está autenticado</p>
        <a href="{{ route('login') }}" class="bg-teal-600 transition ease-in-out rounded-full p-2">Login</a>
        </div>
        @endif

    </header>

    <h1 class="mx-auto text-primary w-fit text-4xl font-bold my-6">@yield('titulo')</h1>

    @yield('conteudo')
</body>

</html>
