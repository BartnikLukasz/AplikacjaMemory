<x-app-layout>
<style>
    .user-button{
        display: none !important;
    }
</style>
    <div class="main-panel">
        <h2 class="text-center">Wystąpił błąd</h2>
        <a class="back-button-container text-center" href="{{ route('login') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>
    </div>
    
</x-app-layuout>