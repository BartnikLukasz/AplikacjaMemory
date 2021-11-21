<x-app-layout>
<style>
    .left-buttons{
        display: none !important;
    }
</style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
    
    
  
    <div class="main-panel w-75 text-center categories" id="add-category">

        <p style="font-size: 0.9em;">{{ __('Załącz co najmniej 10 obrazków, dodaj podpisy i nazwę kategorii') }}</p>

        <form id="categoryForm" action="{{ route('storeCategory') }}" method="POST" enctype="multipart/form-data">

        @error('morePicturesNeeded')
                <span class="invalid-feedback" role="alert">
                    <strong class="bg-light">{{ $message }}</strong>
                </span>
            @enderror

        @csrf

        <div class="categories-container">
            <div id="image_preview" class="row">

                @if($category != null)
                <input type='hidden' name="oldTitle" class="d-inline" value="{{ $category->name }}" />
                @foreach($category->picture()->get() as $image)
                    <div class="col-2 mb-2" style="position:relative;">
                        <a href="{{ route('deleteImage', $image->id) }}" class="delete-image"><div class="delete-image-inner">X</div></a>
                        <div class='add-category-img' style='background-image: url("{{$image->link}}")'></div>
                        <p class="category-title text-center mt-1 text-uppercase">{{$image->word}}</p>
                    </div>
                @endforeach
                @endif
                <div class="label_div col-2 add-category-add-button order-last" id="label_div" name="label_div" style="display: flex;">
                    <label id="label1" for="upload_file1" class="add-category-add-button-inner"><span><i class="bi bi-plus-square"></i><br><span style="font-size: 1rem;">Dodaj<br>obrazek</span></span></label>
                </div>
                <div class="input_div" id="input_div" name="input_div" hidden>
                    <input type="file" id="upload_file1" name="upload_file[]" class="@error('image') is-invalid @enderror" onchange="preview_image(this)" />
                </div>
                
            </div>
            @error('words.*')
                <span class="invalid-feedback" role="alert">
                    <strong class="bg-light">{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row justify-content-between align-items-center mt-3">
            <div class="col text-start">
                    <input type='text' name="title" class="d-inline" pattern=".{1,30}" title="Nazwa kategorii powinna mieć maksymalnie 30 liter." required placeholder="Nazwa kategorii" @if($category != null) value="{{ $category->name }}" @endif/>
            </div>
            <div class="col text-end">
                <input type="submit" class="button d-inline add-category-button" name='submit_category' value="Dodaj Kategorię"/>
            </div>
        </div>
        
        @if($category)
        <div class="category-buttons text-center">
        <input class="button" type="submit" name='submit_category' value="Zapisz">
            <a class="button" href="{{ route('cancelCategoryCreation', $category->id) }}">
            {{ __('Anuluj') }}</a>
           
            
        </div>
        @else
        <div class="category-buttons text-center">
        <input class="button" type="submit" name='submit_category' value="Zapisz">
            <a class="button" href="{{ route('userCategories', Auth::user()->id) }}">
            {{ __('Anuluj') }}</a>
            
            
        </div>
        @endif
        </form>
    </div>
            <script>

                var j = 1;

                function preview_image() 
                {
                    $('#label'+j).hide();
                    j++;
                    $('#label_div').append('<label id="label'+j+'" for="upload_file'+j+'" class="add-category-add-button-inner"><span class="plus-icon"><i class="bi bi-plus-square"></i><br><span style="font-size: 1rem;">Dodaj<br>obrazek</span></span></label>')
                    $('#input_div').append('<input type="file" id="upload_file'+j+'" name="upload_file[]" onchange="preview_image(this)" />');
                    var file=document.getElementById("upload_file"+j);
                    console.log(event.target.files[0]);
                    console.log(file.innerHTML)
                    $('#image_preview').append("<div class='col-2 mb-2'><div class='add-category-img' style='background-image: url("+URL.createObjectURL(event.target.files[0])+")'></div><br><input type='text' name='words[]' pattern='.{1,15}' title='Nazwa obrazka powinna mieć maksymalnie 15 liter.' required placeholder='Tytuł obrazka' class='add-category-text'/></div>");
                }
            </script>
</x-app-layout>