<x-app-layout>
    Załącz co najmniej 10 obrazków, dodaj podpisy i nazwę kategorii
    <div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form action="{{ route('storePicture') }}" method="POST" enctype="multipart/form-data">
@csrf
  <input type="file" id="upload_file" name="upload_file[]" class="@error('image') is-invalid @enderror" onchange="preview_image();" multiple/>
    @error('image')
        <span class="invalid-feedback" role="alert">
            <strong class="bg-light">{{ $message }}</strong>
        </span>
    @enderror
  <div id="image_preview">
@if($category != null)
@foreach($category->picture()->get() as $image)
    <img style='height: 100px; width: 100px' src="{{$image->link}}"/>
    {{$image->word}}
@endforeach
@endif
</div>
<input type='text' name="title"/>
<input type="submit" name='submit_image' value="Dodaj obrazki"/>
 </form>
<img id="0"/></img>
<img id="1"/></img>
<script>
 $(document).ready(function() 
{ 
 $('form').ajaxForm(function() 
 {
  alert("Uploaded SuccessFully");
 }); 
});

function preview_image() 
{
 var total_file=document.getElementById("upload_file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<div><img style='height: 100px; width: 100px' src='"+URL.createObjectURL(event.target.files[i])+"'><br><input type='text' name='words[]'/></div>");
 }
}
</script>
    </div>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layout>