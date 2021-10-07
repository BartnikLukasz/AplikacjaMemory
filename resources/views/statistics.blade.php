<x-app-layout>

    <div class="main-panel" id="statistics-panel">

        <h3 class="mb-4 text-center">{{ __('Twoje statystyki') }}</h3>

        <div class="row mb-3">
            <div class="col-10">
            <span class="fst-italic">{{ __('Rozegranych gier') }}</span>
            </div>
            <div class="col-2 text-end">
            <span>{{ $statistics->gamesPlayed }}</span>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-10">
            <span class="fst-italic" style="white-space: nowrap;">{{ __('Odblokowanych kategorii') }}</span>
            </div>
            <div class="col-2 text-end">
            <span>{{ $statistics->categoriesUnlocked }}</span>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-10">
            <span class="fst-italic">{{ __('Liczba punktów') }}</span>
            </div>
            <div class="col-2 text-end">
            <span>{{ $statistics->points }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
            <span class="fst-italic">{{ __('Pozycja w rankingu') }}</span>
            </div>
            <div class="col-2 text-end">
            <span>{{ $statistics->position }}</span>
            </div>
        </div>

        <a class="back-button-container text-center" href="{{ route('dashboard') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>

    </div>
    
</x-app-layuout>