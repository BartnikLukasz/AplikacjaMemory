<x-app-layout>
<style>
    .left-buttons{
        display: none !important;
    }
</style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
    
    
  
    <div class="main-panel w-75 text-center" id="add-category">

        <p style="font-size: 0.9em;">{{ __('Załącz co najmniej 10 obrazków, dodaj podpisy i nazwę kategorii') }}</p>

        <form id="categoryForm" action="{{ route('storePicture') }}" method="POST" enctype="multipart/form-data">
        <div class="categories-container">
            <div id="image_preview" class="row">
                @if($category != null)
                <input type='hidden' name="oldTitle" class="d-inline" value="{{ $category->name }}" />
                @foreach($category->picture()->get() as $image)
                    <img style='height: 100px; width: 100px' src="{{$image->link}}"/>
                    <a href="{{ route('deleteImage', $image->id) }}">Delete image</a>
                    {{$image->word}}
                @endforeach
                @endif
                <label for="upload_file" class="col-2 add-category-add-button"></label>
                <input type="file" id="upload_file" name="upload_file" class="@error('image') is-invalid @enderror" onchange="preview_image();"/>
            </div>
        </div>
            @csrf
            
                
                   
            

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong class="bg-light">{{ $message }}</strong>
                    </span>
                @enderror
            <div class="row justify-content-between align-items-center mt-3">
                <div class="col text-start">
                    <input type='text' name="title" class="d-inline" placeholder="Nazwa kategorii" @if($category != null) value="{{ $category->name }}" @endif/>
                </div>
                <div class="col text-end">
                    <input type="submit" class="button d-inline add-category-button" name='submit_image' value="Dodaj Obrazek"/>
                </div>
            </div>
        </form>
        @if($category)
        <a class="back-button-container text-center" href="{{ route('cancelCategoryCreation', $category->id) }}" >
            <div class="back-button button">{{ __('Anuluj') }}</div>
        </a>
        <a class="back-button-container text-center" href="{{ route('endCategoryCreation', $category->id) }}">
            <div class="back-button button">{{ __('Zakończ') }}</div>
        </a>
        @else
        <a class="back-button-container text-center" href="{{ route('userCategories', Auth::user()->id) }}" >
            <div class="back-button button">{{ __('Anuluj') }}</div>
        </a>
        <a class="back-button-container text-center" href="{{ route('userCategories', Auth::user()->id) }}">
            <div class="back-button button">{{ __('Zakończ') }}</div>
        </a>
        @endif
    </div>
            <script>
                function preview_image() 
                {
                    var total_file=document.getElementById("upload_file").files.length;
                    
                    for(var i=0;i<total_file;i++)
                    {
                        $('#image_preview').append("<div class='col-2 mb-2'><div class='add-category-img' style='background-image: url("+URL.createObjectURL(event.target.files[i])+")'></div><br><input type='text' name='word' placeholder='Tytuł obrazka' class='add-category-text'/></div>");
                    }
                }
            </script>
</x-app-layout>