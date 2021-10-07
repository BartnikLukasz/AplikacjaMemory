<x-app-layout>

    <div class="main-panel text-center">

        <h3 class="mb-3">{{ __('Informacje o grze') }}</h3>
        
        <h5 class="mb-1">{{ __('Autorzy') }}</h5>
        <p class="mb-4">Łukasz Bartnik <br> Kacper Berliński</p>

        <h5 class="mb-1">{{ __('Kontakt') }}</h5>
        <p class="mb-4">kacper.berlinski@pollub.edu.pl</p>

        <h5 class="mb-1">{{ __('Ostatnia aktualizajca') }}</h5>
        <p class="mb-4">07.10.2021</p>

        <a class="back-button-container text-center" href="{{ route('settings') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>

    </div>

</x-app-layuout>