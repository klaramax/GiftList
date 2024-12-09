<x-layouts.guest>

    <form action="{{ route('login') }}" method="POST" class="w-full flex flex-col gap-4">
        @csrf

        <x-input placeholder="E-mail" type="email" name="email" />
        <x-input placeholder="Heslo" type="password" name="password" />

        <x-primary-button type="submit">Přihlásit se</x-primary-button>
    </form>

</x-layouts.guest>