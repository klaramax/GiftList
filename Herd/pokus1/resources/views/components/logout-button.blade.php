<form action="{{ route('logout') }}" method="POST" class="inline">
    @csrf
    <button type="submit" class="text-green-500 hover:text-green-700">Odhlásit se</button>
