<x-app-layout>

    <div class="main-panel">

        <h3 class="mb-3 text-center">{{ __('Zmiana nazwy użytkownika') }}</h3>

        <form method="POST" action="{{ route('changeUsername') }}">
            @csrf
            <label for="oldNickname">{{ __('Obecna nazwa') }}</label><br>
            <input id="oldNickname" type="text" class="@error('oldNickname') is-invalid @enderror mb" name="oldNickname" value="{{ old('oldNickname') }}" required autocomplete="oldNickname" autofocus><br>

            @error('oldNickname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <label for="newNickname" class="mt-2">Nowa nazwa</label><br>
            <input id="newNickname" type="text" class="@error('newNickname') is-invalid @enderror" name="newNickname" value="{{ old('newNickname') }}" required autocomplete="newNickname"><br>

            @error('newNickname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <label for="password" class="mt-2">{{ __('Hasło') }}</label><br>
            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="submit" value="Zmień nazwę" class="button mt-4">
                
        </form>

        <a class="back-button-container text-center" href="{{ route('settings') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>

    </div>

</x-app-layuout>