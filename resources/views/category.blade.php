<?php
    use Illuminate\Support\Facades\Auth;
?>
<x-app-layout>
<style>
    .left-buttons{
        display: none !important;
    }
</style>

    <div class="main-panel w-75 text-center" id="category">
        <h3 class="mb-4 text-center">{{ $category->name }}</h3>
        <div class="categories-container mb-2">
            <div id="image_preview" class="row">
            
                @foreach($category->picture()->get() as $picture)
                <div class="col-4 col-lg-3 col-xl-2 mb-2">
                    <div class="add-category-img" style="background-image: url('{{$picture->link}}')"></div>
                    <p class="category-title text-center mt-2 text-uppercase">{{$picture->word}}</p>
                </div>    
                @endforeach
            </div>
        </div>

        @if(Auth::user()->id == $category->author)
        <div class="category-buttons">
            <a class="button" href="{{ route('editCategory', $category->id) }}">
                {{ __('Edytuj kategorię') }}</a>
            <a class="button" href="{{ route('deleteCategory', $category->id) }}" onclick="return confirm('Kategoria zostanie bezpowrotnie usunięta. Kontynuować?')">
                {{ __('Usuń kategorię') }}</a>
        </div>
        
        @endif

        <a class="back-button-container text-center" href="{{ route('userCategories', Auth::user()->id) }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>
    
    </div>

</x-app-layuout>
