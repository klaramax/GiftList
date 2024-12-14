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
            <!-- Person name -->
            <h3 class="text-2xl font-semibold text-green-800">{{ $person->name }}</h3>
            <div class="mt-4">
                @if ($person->gifts->count() > 0)
                    <ul>
                        @foreach ($person->gifts as $gift)
                            <li class="text-lg flex w-full justify-between items-center">
                                <span>{{ $gift->name }} - {{ number_format($gift->price, 0, ',', '') }} Kč</span>

                                <!-- Three dots menu trigger -->
                                <div class="relative group">
                                    <button class="p-2 hover:bg-gray-100 rounded-full focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 group-hover:text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm0 5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zm1.5 8a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                        </svg>
                                    </button>

                                    <!-- Context menu (hidden by default) -->
                                    <div class="hidden group-hover:block absolute right-0 mt-2 w-24 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                                        <a href="{{ route('gift.edit', $gift->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Upravit
                                        </a>
                                        <form action="{{ route('gift.destroy', $gift->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                Smazat
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
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
