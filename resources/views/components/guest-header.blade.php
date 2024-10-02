<header class="p-6">
    <header class="text-center font-bold text-2xl">
        @if (request()->is('login'))
        Login
        @elseif (request()->is('register'))
        Registration
        @else
        {{ config('app.name', 'Laravel') }}
        @endif
    </header>
</header>