<x-app-layout>
<style>
    .left-buttons{
        display: none !important;
    }
</style>

    <div class="main-panel w-75 categories" id="choose-category">
        <div class="categories-container">
            <div class="row">
                
                @foreach ($categories as $category)
                <div class="col-2 mb-2">
                    <a href="{{ route('startGame', [$category->id, $level]) }}" class="text-decoration-none">
                        <div class="one-category" style="background-image: url('{{asset('img/background.jpg')}}');"></div>
                        <p class="category-title text-center mt-2">{{ $category->name }}</p>
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