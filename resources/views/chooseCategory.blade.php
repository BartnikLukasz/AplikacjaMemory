<x-app-layout>
    <div>
        Category choice screen
        <a class="btn btn-primary" href="{{ route('game') }}">
            {{ __('Kategoria 1') }}
        </a>
        <a class="btn btn-primary" href="{{ route('game') }}">
            {{ __('Kategoria 2') }}
        </a>
        <a class="btn btn-primary" href="{{ route('game') }}">
            {{ __('Kategoria 3') }}
        </a>
        @foreach ($categories as $category)
        <a class="btn btn-primary" href="{{ route('game') }}">
            {{ $category->name }}
        </a>
        @endforeach
        </div>
        <a class="btn btn-primary" href="{{ route('chooseDifficulty') }}">
            {{ __('Powrót') }}
        </a>
    </div>
</x-app-layuout>