<x-app-layout>
    <div>
        Zmiana hasła
    <form method="POST" action="{{ route('changePassword') }}">
        @csrf

        <div class="form-group row">
            <label for="oldPassword" class="col-md-4 col-form-label text-md-right">{{ __('Obecna nazwa') }}</label>

            <div class="col-md-6">
                <input id="oldPassword" type="text" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" value="{{ old('oldPassword') }}" required autocomplete="oldPassword" autofocus>

                @error('login')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="newPassword" class="col-md-4 col-form-label text-md-right">{{ __('Hasło') }}</label>

            <div class="col-md-6">
                <input id="newPassword" type="newPassword" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" required autocomplete="current-newPassword">

                @error('newPassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Zmień hasło') }}
                </button>
            </div>
        </div>
    </form>

    </div>
    <a class="btn btn-primary" href="{{ route('settings') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layuout>