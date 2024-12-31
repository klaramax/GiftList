<x-layouts.guest>

    <form action="{{ route('register') }}" method="POST" class="w-full flex flex-col gap-4">
        @csrf
        <x-input placeholder="Jméno a příjmení" type="text" name="name" value="{{ old('name') }}" />

        <x-input placeholder="E-mail" type="email" name="email" value="{{ old('email') }}" />

        <x-input placeholder="Heslo" type="password" name="password" />

        <x-input placeholder="Potvrdit heslo" type="password" name="password_confirmation" />

        <x-primary-button type="submit">Registrovat se</x-primary-button>
    </form>

</x-layouts.guest>