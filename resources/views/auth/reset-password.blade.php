<x-guest-layout>

    <div class="main-panel">
        
        <!-- Validation Errors -->
        <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> -->

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

        
            <label for="email">{{ __('Email') }}</label><br>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autocomplete="email" autofocus><br>
    
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong class="bg-light">{{ $message }}</strong>
                </span>
            @enderror


            <label for="password" class="mt-2">{{ __('Hasło') }}</label><br>
            <input id="password" type="password" name="password" required><br>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong class="bg-light">{{ $message }}</strong>
                </span>
            @enderror


            <label for="password_confirmation" class="mt-2">{{ __('Powtórz hasło') }}</label><br>
            <input id="password_confirmation" type="password" name="password_confirmation" required><br>

            
            <input type="submit" value="Zresetuj hasło" class="button mt-4">
            
        </form>

    </div>
    
</x-guest-layout>
