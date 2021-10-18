<x-guest-layout>

        <div class="main-panel">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                
                <label for="nickname">{{ __('Login') }}</label><br>
                <input id="nickname" type="text" class=" @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname" autofocus><br>
                
                <label for="password" class="mt-2">{{ __('Hasło') }}</label><br>
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br>
                
                @error('login')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                @if (Route::has('password.request'))
                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                        <p class="text-end mt-2">{{ __('Nie pamiętasz hasła?') }}</p>
                    </a>
                @endif

                <input type="submit" value="Zaloguj się" class="button">

            </form>

            <div class="main-panel-register text-center mt-4">
                <span class="d-inline-block mb-2">Nie masz jeszcze konta?</span><br>
                <a class="register-button button" href="{{ route('register') }}">
                {{ __('Zarejestruj się') }}
                </a>
            </div>

        </div>

</x-guest-layout>
