<x-layouts.app>
    <div class="flex flex-col width-full items-center relative">
        <h1 class="text-3xl font-bold text-green-800 mt-8 mb-8">Přidat novou osobu</h1>

        <form action="{{ route('person.store') }}" method="POST" class="flex flex-col items-center w-full gap-8">
            @csrf
            <x-input placeholder="Jméno" type="text" name="name" id="name" required style="max-width:400px;margin-left:auto;margin-right:auto;" />
            <x-primary-button type="submit" style="min-width:400px;">Uložit</x-primary-button>
        </form>
        <a href="{{ route('dashboard') }}" class="absolute top-8 -left-4 flex gap-1 items-center">
            <img src="{{ asset('images/back.svg') }}" alt="Back"/>
            <span class="text-green-800">Zpět</span>
        </a>
    </div>
</x-layouts.app>
