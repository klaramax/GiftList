<x-layouts.guest>

    <form action="{{ route('register-store') }}" method="POST" class="flex flex-col gap-4 px-8">
        @csrf
        <x-input placeholder="Jméno a příjmení" type="text" name="name" />
        <x-input placeholder="E-mail" type="email" name="email"/>
        <x-input placeholder="Heslo" type="password" name="password" />
        <x-input placeholder="Potvrdit heslo" type="confirm-password" name="password_confirmation" />

        <x-primary-button>Registrovat se</x-primary-button>
    </form>

</x-layouts.guest>