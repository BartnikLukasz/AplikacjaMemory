<x-app-layout>
    <div>
        Zmiana nazwy użytkownika
    <form method="POST" action="{{ route('changeUsername') }}">
        @csrf

        <div class="form-group row">
            <label for="oldNickname" class="col-md-4 col-form-label text-md-right">{{ __('Obecna nazwa') }}</label>

            <div class="col-md-6">
                <input id="oldNickname" type="text" class="form-control @error('oldNickname') is-invalid @enderror" name="oldNickname" value="{{ old('oldNickname') }}" required autocomplete="oldNickname" autofocus>

                @error('login')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="newNickname" class="col-md-4 col-form-label text-md-right">{{ __('Nowa nazwa') }}</label>

            <div class="col-md-6">
                <input id="newNickname" type="text" class="form-control @error('newNickname') is-invalid @enderror" name="newNickname" value="{{ old('newNickname') }}" required autocomplete="newNickname" autofocus>

                @error('login')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div

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