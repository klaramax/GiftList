<x-layouts.app>

    <div class="flex gap-4 justify-between items-center mb-4">

        <h1 class="text-4xl font-bold text-green-800 mt-8 mb-8">Dárky</h1>

        <!-- Add new person button -->
        <a href="{{ route('person.create') }}">
            <x-primary-button>Přidat osobu</x-primary-button>
        </a>

        <!-- Add new gift button -->
        <a href="{{ route('gift.create') }}">
            <x-primary-button>Přidat dárek</x-primary-button>
        </a>
    </div>

    <div class="grid grid-cols-3 gap-4">
            @foreach ($persons as $person)
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <h3 class="text-2xl font-semibold text-green-800">{{ $person->name }}</h3>
                    <div class="mt-4">
                        @if ($person->gifts->count() > 0)
                            <ul>
                                @foreach ($person->gifts as $gift)
                                    <li class="text-lg">{{ $gift->name }} - {{ number_format($gift->price, 0, ',', '') }} Kč</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">Žádné dárky</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

    <hr class="my-4">

    <div class="flex w-full justify-end mt-auto">
    <x-logout-button></x-logout-button>
    </div>
</form>

</x-layouts.app>
