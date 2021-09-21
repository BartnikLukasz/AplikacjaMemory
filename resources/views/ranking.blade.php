<x-app-layout>

    <div class="main-panel text-center">

        <h3 class="mb-3">Tablica rankingu</h3>
        
        <ol class="p-0 ranking-list">

            @foreach ($users as $user)

            <li class="row text-start">
                <div class="col-7">{{$user->nickname}}</div>
                <div class="col-4 text-end">{{$user->ranking_points}}</div>
            </li>
          
            @endforeach

        </ol>

        <p style="font-size: 0.9em;">Tablica aktualizuje się o pełnych godzinach</p>
        <a class="button" href="{{ route('dashboard') }}">
            {{ __('Powrót') }}
        </a>
            
    </div>
    
</x-app-layout>