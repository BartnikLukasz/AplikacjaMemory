<x-app-layout>

    <div class="main-panel">

        <h3 class="mb-3 text-center">Tablica rankingu</h3>
        <div class="ranking-list-container">
            <ol class="p-0 ranking-list">

                @foreach ($users as $user)

                <li class="row text-start">
                    <div class="col-7">{{$user->nickname}}</div>
                    <div class="col-5 text-end">{{$user->ranking_points}}</div>
                </li>
            
                @endforeach

            </ol>
        </div>

        <p style="font-size: 0.9em;" class="mt-2">{{ __('Tablica aktualizuje się o pełnych godzinach') }}</p>

        <a class="back-button-container text-center" href="{{ route('dashboard') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>
            
    </div>
    
</x-app-layout>