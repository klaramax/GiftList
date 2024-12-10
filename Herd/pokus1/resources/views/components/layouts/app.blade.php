<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-zinc-50">

    <header class="w-full bg-white p-4 flex items-center justify-end shadow">

       <img src="https://ui-avatars.com/api/?name={{auth()->user()->name}}" class="rounded-full w-8 h-8" alt="">

    </header>

    <main class="lg:w-2/3 w-full mx-auto py-8 flex flex-col">
        {{ $slot }}
    </main>

</body>


@livewireScripts

</html>