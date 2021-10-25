<x-app-layout>

    <div class="main-panel">

        <h3 class="mb-3 text-center">Zmiana hasła <br>użytkownika {{ $user->username }}</h3>
    
        <form method="POST" action="{{ route('adminChangeUserPassword') }}">
            @csrf

            <input type='hidden' name="id" class="d-inline" value="{{ $user->id }}" />
            
            <label for="password" class="mt-2">{{ __('Nowe hasło') }}</label><br>
            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <input type="submit" value="Zmień hasło" class="button mt-4">

        </form>
    
        <a class="back-button-container text-center" href="{{ route('controlPanelUsers') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>

    </div>

</x-app-layuout>