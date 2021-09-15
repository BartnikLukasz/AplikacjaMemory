<x-app-layout>
    <div>
        Rozegranych gier: {{ $statistics->gamesPlayed }}</br>
        Odblokowanych kategorii: {{ $statistics->categoriesUnlocked }}</br>
        Liczba punktów: {{ $statistics->points }}</br>
        Pozycja w rankingu: {{ $statistics->position }}</br>

    </div>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layuout>