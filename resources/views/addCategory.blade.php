<x-app-layout>
    Załącz co najmniej 10 obrazków, dodaj podpisy i nazwę kategorii
    <div>
    <form>
    <input type="file" name="my_file[]" accept="image/*" multiple onchange="loadFile(event)">
</form>
@foreach($category->picture()->get() as $image)
    <img src="{{$image->link}}"/>
    {{$image->word}}
@endforeach
<img id="output1"/>
<img id="output2"/>
<script>
  var loadFile = function(event) {
    var output1 = document.getElementById('output1');
    output1.src = URL.createObjectURL(event.target.files[0]);
    output1.onload = function() {
      URL.revokeObjectURL(output1.src) // free memory
    }
    var output2 = document.getElementById('output2');
    output2.src = URL.createObjectURL(event.target.files[1]);
    output2.onload = function() {
      URL.revokeObjectURL(output2.src) // free memory
    }
  };
</script>
    </div>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layout>