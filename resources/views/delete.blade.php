<x-app-layout>
    <div>
        Usunięcie osiągnięć konta
    <form method="POST" action="{{ route('deleteUser') }}">
        @csrf
        Aby usunąć konto proszę podać hasło
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hasło') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Zmień nazwę') }}
                </button>
            </div>
        </div>
    </form>

    </div>
    <a class="btn btn-primary" href="{{ route('settings') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layuout>