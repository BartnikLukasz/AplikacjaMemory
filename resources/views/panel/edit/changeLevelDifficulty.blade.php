<x-app-layout>
    <h3 class="mb-3 text-center">Zmiana poziomu {{ $oldLevelDifficulty->level }}</h3>
        <form method="POST" action="{{ route('changeLevelDifficulty') }}">
            @csrf

            <input type='hidden' name="id" class="d-inline" value="{{ $oldLevelDifficulty->id }}" />

            <label for="multiplier" class="mt-2">Mnożnik punktów</label><br>
            <input id="multiplier" type="number" class="@error('multiplier') is-invalid @enderror" name="multiplier" value="{{ $oldLevelDifficulty->multiplier }}" required autocomplete="multiplier"><br>

            @error('multiplier')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="submit" value="Zmień poziom" class="button mt-4">

        </form>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layuout>