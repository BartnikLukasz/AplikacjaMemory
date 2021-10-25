<x-guest-layout>

    <div class="main-panel">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> -->

        <form class="odzyskiwanie-form" method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <h3 class="mb-3 text-center">{{ __('Odzyskiwanie hasła') }}</h3>
            <label for="email">{{ __('Email') }}</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus><br>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong class="bg-light">{{ $message }}</strong>
                </span>
            @enderror

            <input type="submit" value="Przypomnij hasło" class="button mt-4">
        </form>
        
    </div>

</x-guest-layout>
