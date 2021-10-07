<x-app-layout>
<style>
    .left-buttons{
        display: none !important;
    }
</style>

    <div class="main-panel w-75" id="choose-category">
        <div class="categories-container">
            <div class="row justify-content-center">
                
                @foreach ($categories as $category)
                <div class="col-2 m-2">
                    <a href="{{ route('game') }}" class="text-decoration-none">
                        <div class="one-category" style="background-image: url('{{asset('img/background.jpg')}}');"></div>
                        <p class="category-title text-center mt-1">{{ $category->name }}</p>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
        <a class="back-button-container text-center" href="{{ route('chooseDifficulty') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>
    </div>

</x-app-layuout>