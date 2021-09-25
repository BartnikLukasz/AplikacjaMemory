<x-app-layout>

    <div class="main-panel">

        <h3 class="mb-3 text-center">{{ __('Zmiana hasła') }}</h3>
    
        <form method="POST" action="{{ route('changePassword') }}">
            @csrf
            
            <label for="oldPassword">{{ __('Obecne hasło') }}</label><br>
            <input id="oldPassword" type="password" class="@error('oldPassword') is-invalid @enderror" name="oldPassword" value="{{ old('oldPassword') }}" required autocomplete="oldPassword" autofocus><br>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <label for="newPassword" class="mt-2">{{ __('Nowe hasło') }}</label><br>
            <input id="newPassword" type="password" class="@error('newPassword') is-invalid @enderror" name="newPassword" required autocomplete="current-newPassword"><br>

            @error('newPassword')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <input type="submit" value="Zmień hasło" class="button mt-4">

        </form>
    
        <a class="back-button-container text-center" href="{{ route('settings') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>

    </div>

</x-app-layuout>