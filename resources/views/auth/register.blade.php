<x-guest-layout>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="main-panel">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="email">{{ __('Email') }}</label><br>
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"><br>
            
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong class="bg-light">{{ $message }}</strong>
                </span>
            @enderror

            <label for="nickname" class="mt-2">{{ __('Login') }}</label><br>
            <input id="nickname" type="text" class="@error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname" autofocus><br>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong class="bg-light">{{ $message }}</strong>
                </span>
            @enderror

            <label for="password" class="mt-2">{{ __('Hasło') }}</label><br>
            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password"><br>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong class="bg-light">{{ $message }}</strong>
                </span>
            @enderror

            <label for="password-confirm" class="mt-2">{{ __('Powtórz hasło') }}</label><br>
            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"><br>

            <input type="submit" value="Zarejestruj się" class="button mt-4">
        </form>
    </div>

</x-guest-layout>


