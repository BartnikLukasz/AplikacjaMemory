<?php
    use Illuminate\Support\Facades\Auth;
?>

<x-app-layout>

    <div class="main-panel">
        <div class="d-flex flex-column">
            <a class="start-button button" href="{{ route('chooseDifficulty') }}">
            <i class="bi bi-joystick icon-start"></i><br>{{ __('Start') }}
            </a>

            <a class="button" href="{{ route('userCategories', Auth::user()->id) }}">
            <i class="bi bi-plus-square icon"></i> <br>{{ __('Własne kategorie') }}
            </a>

            <a class="button" href="{{ route('userStatistics', Auth::user()->id) }}">
            <i class="bi bi-graph-up icon"></i><br>{{ __('Statystyki') }}
            </a>

            <a class="button" href="{{ route('settings') }}">
            <i class="bi bi-sliders icon"></i><br>{{ __('Ustawienia') }}
            </a>

            @if(Auth::user()->isAdmin())
            <a class="button" href="{{ route('controlPanelUsers') }}">
                {{ __('Panel administratora') }}
            </a>
            @endif
        </div>
    </div>
    
</x-app-layout>
