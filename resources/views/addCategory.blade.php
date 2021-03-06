<x-app-layout>
<style>
    .left-buttons{
        display: none !important;
    }
</style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
    
    
  
    <div class="main-panel w-75 text-center" id="add-category">

        <p style="font-size: 0.9em;">{{ __('Załącz co najmniej 10 obrazków, dodaj podpisy i nazwę kategorii. Maksymalny rozmiar obrazka to 1MB.') }}</p>

        <form id="categoryForm" action="{{ route('storeCategory') }}" method="POST" enctype="multipart/form-data">

        @error('morePicturesNeeded')
                <span class="invalid-feedback" role="alert">
                    <strong class="bg-light">{{ $message }}</strong>
                </span>
            @enderror
            @error('picturesTooHeavy')
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
                    <div class="col-4 col-lg-3 col-xl-2 mb-2" style="position:relative;">
                        <a href="{{ route('deleteImage', $image->id) }}" class="delete-image"><div class="delete-image-inner">X</div></a>
                        <div class='add-category-img' style='background-image: url("{{$image->link}}")'></div>
                        <p class="category-title text-center mt-1 text-uppercase">{{$image->word}}</p>
                    </div>
                @endforeach
                @endif
                <div class="label_div col-4 col-lg-3 col-xl-2 add-category-add-button order-last" id="label_div" name="label_div" style="display: flex;">
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
                    <input type='text' id="categoryTitle"  name="title" class="d-inline" pattern=".{1,20}" title="Nazwa kategorii może zawierać maksymalnie 20 znaków." onchange="checkCategoryName(this)" required placeholder="Nazwa kategorii" @if($category != null) value="{{ $category->name }}" @endif/>
            </div>
            <div class="col text-end">
              <!--  <input type="submit" class="button d-inline add-category-button" name='submit_category' value="Dodaj Kategorię"/>-->
                @if($category)
        
                    <a class="button d-inline add-category-button-return" href="{{ route('cancelCategoryCreation', $category->id) }}">{{ __('Powrót') }}</a>    
                    <input class="button d-inline add-category-button" type="button" name='submit_category' value="Zapisz">
                
                @else
                
                    <a class="button d-inline add-category-button-return" href="{{ route('userCategories', Auth::user()->id) }}">{{ __('Powrót') }}</a>
                    <input class="button d-inline add-category-button" type="button" name='submit_category' value="Zapisz">

                @endif
            </div>
        </div>
        
        
        </form>
    </div>
            <script>

                var j = 1;
                function preview_image() 
                {
                    $('#label'+j).hide();
                    j++;
                    $('#label_div').append('<label id="label'+j+'" for="upload_file'+j+'" class="add-category-add-button-inner upload_file'+(j-1)+'"><span class="plus-icon"><i class="bi bi-plus-square"></i><br><span style="font-size: 1rem;">Dodaj<br>obrazek</span></span></label>')
                    $('#input_div').append('<input type="file" id="upload_file'+j+'" class="upload_file'+(j-1)+'" name="upload_file[]" onchange="preview_image(this)" />');
                    $('#upload_file'+(j-1)).each(function(){
            
                            if(this.files[0].size > 1048576){

                                    alert("Maksymalny rozmiar obrazka to 1MB."); 
                                    let element = this.id;
                                    $('.'+element).remove();
                                    j--;
                                    $('#label'+j).show();

                            } else{
                                var file=document.getElementById("upload_file"+j);
                                console.log(event.target.files[0]);
                                console.log(file.innerHTML)
                                $('#image_preview').append("<div class='col-4 col-lg-3 col-xl-2 mb-2 upload_file"+(j-1)+"'><div class='add-category-img' style='background-image: url("+URL.createObjectURL(event.target.files[0])+")'></div><br><input type='text' name='words[]' pattern='.{1,10}' title='Nazwa obrazka może zawierać maksymalnie 10 znaków.' required placeholder='Tytuł obrazka' class='add-category-text'/></div>");
                            } 
                        });
                   
                }

                var categoriesName = <?php echo json_encode($categoriesName); ?>;
                var categoryName = $('#categoryTitle');

                function checkCategoryName(){
                    if(categoriesName.includes(categoryName.val())){
                        categoryName.val("");
                        alert("Kategoria o podanej nazwie już istnieje");
                    }
                }

            </script>
</x-app-layout>