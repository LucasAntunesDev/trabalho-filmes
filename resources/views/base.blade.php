<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-neutral-800 text-zinc-50">

    <header class="flex justify-between px-12 items-center h-fit w-screen py-4">

        <div class="inline-flex items-center gap-4 ">
            <a href="{{ route('index') }}" class="inline-flex items-center gap-x-2 hover:text-white/80">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house">
                    <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                    <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" /></svg>
                <span>Início</span>
            </a>

            <a href="{{ route('filmes') }}" class="inline-flex items-center gap-x-2 hover:text-white/80">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clapperboard">
                    <path d="M20.2 6 3 11l-.9-2.4c-.3-1.1.3-2.2 1.3-2.5l13.5-4c1.1-.3 2.2.3 2.5 1.3Z" />
                    <path d="m6.2 5.3 3.1 3.9" />
                    <path d="m12.4 3.4 3.1 4" />
                    <path d="M3 11h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z" />
                </svg>
                <span>Filmes</span>
            </a>

            @if (Auth::user() && Auth::user()->admin)
            <a href="{{ route('usuarios') }}" class="inline-flex items-center gap-x-2 hover:text-white/80">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" /></svg>
                <span>Usuários</span>
            </a>
            @endif
        </div>


        @if (Auth::user())
        <div class="inline-flex items-center gap-4 ">
            <p>Olá, {{ Auth::user()['name'] }}!</p>
            <a href="{{ route('logout') }}" class="btn-danger">Logout</a>
        </div>
        @else
        <div class="inline-flex items-center gap-4 ">
            <p>Você não está autenticado</p>
            <a href="{{ route('login') }}" class="btn-success">Login</a>
        </div>
        @endif

    </header>

    <h1 class="mx-auto text-primary w-fit text-4xl font-bold my-6">@yield('titulo')</h1>

    @yield('conteudo')
</body>

</html>
