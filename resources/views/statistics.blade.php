<x-app-layout>

    <div class="main-panel" id="statistics-panel">

        <h3 class="mb-4 text-center">{{ __('Twoje statystyki') }}</h3>
            
            <p class="statistic-title pt-2">{{ __('Rozegranych gier') }}</p>
           
            <p>{{ $statistics->gamesPlayed }}</p>
            
        
            <p class="statistic-title">{{ __('Odblokowanych kategorii') }}</p>
            
            <p>{{ $statistics->categoriesUnlocked }}</p>
          
            <p class="statistic-title">{{ __('Liczba punktów') }}</p>
           
            <p>{{ $statistics->points }}</p>
         
            <p class="statistic-title">{{ __('Pozycja w rankingu') }}</p>
            
            <p class="pb-2">{{ $statistics->position }}</p>
          

        <a class="back-button-container text-center" href="{{ route('dashboard') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>

    </div>
    
</x-app-layuout>