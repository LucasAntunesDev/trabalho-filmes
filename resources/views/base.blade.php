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

    <h1 class="mx-auto text-primary w-fit text-4xl font-bold my-6">@yield('titulo')</h1>

    @yield('conteudo')
</body>

</html>