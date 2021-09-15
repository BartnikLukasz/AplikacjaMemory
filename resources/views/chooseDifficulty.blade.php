<x-app-layout>
    <div>
        Difficulty choice screen
        <a class="btn btn-primary" href="{{ route('chooseCategory') }}">
            {{ __('Łatwy') }}
        </a>
        <a class="btn btn-primary" href="{{ route('chooseCategory') }}">
            {{ __('Średni') }}
        </a>
        <a class="btn btn-primary" href="{{ route('chooseCategory') }}">
            {{ __('Trudny') }}
        </a>
    </div>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layuout>