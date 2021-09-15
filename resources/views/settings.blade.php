<x-app-layout>
    <div>
        Ustawienia
    <a class="btn btn-primary" href="{{ route('changeUsernameView') }}">
        {{ __('Zmiana nazwy użytkownika') }}
    </a>
    <a class="btn btn-primary" href="{{ route('changePasswordView') }}">
        {{ __('Zmiana hasła') }}
    </a>
    <a class="btn btn-primary" href="{{ route('resetView') }}">
        {{ __('Reset osiągnięć') }}
    </a>
    <a class="btn btn-primary" href="{{ route('deleteUserView')}}">
        {{ __('Usunięcie konta') }}
    </a>
    <a class="btn btn-primary" href="{{ route('information') }}">
        {{ __('Informacja o grze') }}
    </a>
    </div>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layuout>