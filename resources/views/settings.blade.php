<x-app-layout>

    <div class="main-panel text-center">
        <div class="d-flex flex-column text-center">
            
            <h3 class="mb-3">{{ __('Ustawienia') }}</h3>

            <a class="button" href="{{ route('changeUsernameView') }}">
                {{ __('Zmiana nazwy użytkownika') }}
            </a>

            <a class="button" href="{{ route('changePasswordView') }}">
                {{ __('Zmiana hasła') }}
            </a>

            <a class="button" href="{{ route('resetView') }}">
                {{ __('Reset osiągnięć') }}
            </a>

            <a class="button" href="{{ route('deleteUserView')}}">
                {{ __('Usunięcie konta') }}
            </a>

            <a class="button" href="{{ route('information') }}">
                {{ __('Informacja o grze') }}
            </a>
        </div>

        <a class="back-button-container" href="{{ route('dashboard') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>
    </div>

</x-app-layuout>