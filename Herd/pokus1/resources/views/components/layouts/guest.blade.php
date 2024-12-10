<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

</head>

<body class="flex flex-col bg-cover bg-center h-screen w-screen items-center justify-center"
style="background-image: url('{{ asset('images/DALL·E-gifts.jpg') }}');">
    <div class="bg-neutral-100 bg-opacity-90 flex flex-col items-center p-8 md:p-16 rounded-2xl">
        <h1 class="font-festive text-3xl md:text-6xl text-green-800 font-bold mb-8 text-center">Vánoční seznam dárků</h1>
        <div class="w-full max-w-[350px] flex flex-col items-center justify-center">
            {{ $slot }}
        </div>
        <a class="underline hover:no-underline text-green-900 text-md mt-8" href="{{ route('register') }}">Ještě nemáte účet? Zaregistrujte se</a>
    </div>

</body>

</html>