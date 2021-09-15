<x-app-layout>
    <div>
        Twoje kategorie
        <a class="btn btn-primary" href="{{ route('game') }}">
            {{ __('Kategoria 1') }}
        </a>
        <a class="btn btn-primary" href="{{ route('game') }}">
            {{ __('Kategoria 2') }}
        </a>
        <a class="btn btn-primary" href="{{ route('game') }}">
            {{ __('Kategoria 3') }}
        </a>
        @foreach($categories as $category)
        <a class="btn btn-primary" href="{{ route('game') }}">
            {{ $category->name }}
        </a>
        @endforeach
        <a class="btn btn-primary" href="{{ route('game') }}">
            {{ __('Usuń kategorię') }}
        </a>
        <a class="btn btn-primary" href="{{ route('game') }}">
            {{ __('Edytuj kategorię') }}
        </a>
        <a class="btn btn-primary" href="{{ route('game') }}">
            {{ __('Dodaj nową kategorię') }}
        </a>
        </div>
        <a class="btn btn-primary" href="{{ route('dashboard') }}">
            {{ __('Powrót') }}
        </a>

    </div>
</x-app-layuout>