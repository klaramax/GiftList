<x-layouts.app>

    <div class="flex justify-between mb-4">

        <h1 class="text-3xl font-bold mb-4 text-gray-700">Moje seznamy přání</h1>

        <!-- Add new person button -->
        <a href="{{ route('person.create') }}">
            <x-primary-button>Přidat osobu</x-primary-button>
        </a>

        <!-- Add new gift button -->
        <a href="{{ route('gift.create') }}">
            <x-primary-button>Přidat dárek</x-primary-button>
        </a>
    </div>

    <hr class="my-4">

    <x-logout-button></x-logout-button>
</form>

</x-layouts.app>
