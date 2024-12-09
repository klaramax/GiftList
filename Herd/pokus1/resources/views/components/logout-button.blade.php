<form action="{{ route('logout') }}" method="POST" class="inline">
    @csrf
    <button type="submit" class="text-red-500 hover:text-red-700">Odhlásit se</button>
