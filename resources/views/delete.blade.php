<x-app-layout>

    <div class="main-panel">

        <h3 class="mb-3 text-center">{{ __('Usunięcie konta') }}</h3>
            
        <form method="POST" action="{{ route('deleteUser') }}">
            @csrf

            <p class="text-center">Aby usunąć konto proszę podać hasło</p>
            
            <label for="password">{{ __('Hasło') }}</label><br>
            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                
            <input type="submit" value="Usuń konto" class="button mt-4" onclick="return confirm('UWAGA! Konto zostanie bezpowrotnie usunięte. Kontynuować?')">
            
        </form>

        <a class="back-button-container text-center" href="{{ route('settings') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>

    </div>
    
</x-app-layuout>