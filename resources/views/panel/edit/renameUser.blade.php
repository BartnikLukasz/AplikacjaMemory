<x-app-layout>

    <div class="main-panel">

        <h3 class="mb-3 text-center">Zmiana nazwy użytkownika {{ $user->nickname }}</h3>

        <form method="POST" action="{{ route('adminRenameUser') }}">
            @csrf

            <input type='hidden' name="id" class="d-inline" value="{{ $user->id }}" />
            
            <label for="nickname" class="mt-2">Nowa nazwa</label><br>
            <input id="nickname" type="text" class="@error('newNickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname"><br>

            @error('nickname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="submit" value="Zmień nazwę" class="button mt-4">
                
        </form>

        <a class="back-button-container text-center" href="{{ route('controlPanelUsers') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>

    </div>

</x-app-layuout>