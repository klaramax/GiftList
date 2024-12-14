<x-layouts.app>
    <div class="flex flex-col width-full items-center relative">
        <h1 class="text-3xl font-bold text-green-800 mt-8 mb-8">Přidat nový dárek</h1>

        <form action="{{ route('gift.store') }}" method="POST" class="flex flex-col items-center w-full gap-8">
            @csrf
            <x-input placeholder="Název dárku" type="text" name="name" required style="max-width:400px;margin-left:auto;margin-right:auto;" />
            <select name="person_id" id="person_id" required class="max-w-[400px] w-full border p-2 rounded-md">
                <option value="">-- Pro koho --</option>
                @foreach ($persons as $person)
                    <option value="{{ $person->id }}">{{ $person->name }}</option>
                @endforeach
            </select>
            <x-input placeholder="Cena dárku" type="text" name="price" style="max-width:400px;margin-left:auto;margin-right:auto;" />
            <x-input placeholder="Odkaz na dárek" type="text" name="url" style="max-width:400px;margin-left:auto;margin-right:auto;" />
            <x-input placeholder="Název obchodu" type="text" name="where_bought" style="max-width:400px;margin-left:auto;margin-right:auto;" />
            <x-primary-button type="submit" style="min-width:400px;">Uložit</x-primary-button>
        </form>

        <a href="{{ route('dashboard') }}" class="absolute top-8 -left-4 flex gap-1 items-center">
            <img src="{{ asset('images/back.svg') }}" alt="Back"/>
            <span class="text-green-800">Zpět</span>
        </a>
    </div>
</x-layouts.app>
