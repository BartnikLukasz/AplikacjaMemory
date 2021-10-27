<x-app-layout>
<style>
    .left-buttons{
        display: none !important;
    }
</style>

    <div class="main-panel" id="choose-difficulty">

        <div class="row">
            <div class="col-4">
                <a class="difficult-button easy mx-2" href="{{ route('chooseCategory', 1) }}">
                    <span class="main-text">{{ __('Łatwy') }}</span>
                    <span class="description">{{ __('3 pary') }}</span>
                </a>
            </div>

            <div class="col-4">
                <a class="difficult-button medium mx-2" href="{{ route('chooseCategory', 2) }}">
                    <span class="main-text">{{ __('Średni') }}</span>
                    <span class="description">{{ __('6 par') }}</span>
                </a>
            </div>

            <div class="col-4">
                <a class="difficult-button hard mx-2" href="{{ route('chooseCategory', 3) }}">
                    <span class="main-text">{{ __('Trudny') }}</span>
                    <span class="description">{{ __('10 par') }}</span>
                </a>
            </div>

        </div>

        <a class="back-button-container text-center" href="{{ route('dashboard') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>

    </div>

</x-app-layuout>