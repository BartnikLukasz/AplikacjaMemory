<x-app-layout>
    <div>
        Ustawienia
    <a class="btn btn-primary" href="{{ route('changeUsernameView') }}">
        {{ __('Informacje o użytkownikach') }}
    </a>
    </div>
    <div>

    </div>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layuout>