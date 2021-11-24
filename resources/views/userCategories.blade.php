<x-app-layout>
<?php
        $i = 0;
    ?>
<style>
    .left-buttons{
        display: none !important;
    }
</style>

    <div class="main-panel w-75 categories" id="user-categories">
       
        <h3 class="mb-3 text-center">{{ __(' Twoje kategorie') }}</h3>

        <div class="categories-container">
            <div class="row">
                @foreach($categories as $category)
                <div class="col-4 col-lg-3 col-xl-2 mb-2">
                    <a class="text-decoration-none" href="{{ route('category', $category->id) }}">
                        <div class="one-category" style="background-image: url('{{asset($pictures[$i])}}');"></div>
                        <p class="category-title text-center mt-2">{{ $category->name }}</p>
                    </a>
                </div>
                <?php
        $i++;
    ?>
                @endforeach
            </div>
        </div>

        <div class="category-buttons">
            <a class="button" href="{{ route('addCategory') }}">
                    {{ __('Dodaj nową kategorię') }}
            </a>
        </div>

        <a class="back-button-container text-center" href="{{ route('dashboard') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>
        
    </div>

</x-app-layuout>