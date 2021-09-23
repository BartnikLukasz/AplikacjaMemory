<?php
    use Illuminate\Support\Facades\Auth;
?>
<x-app-layout>
    <div>
        @foreach($category->picture()->get() as $picture)
            <img style='height: 100px; width: 100px' src="{{$picture->link}}"/>
            {{$picture->word}}
            </br>
        @endforeach
    </div>
    @if(Auth::user()->id == $category->author)
    <a class="btn btn-primary" href="{{ route('editCategory', $category->id) }}">
            {{ __('Edytuj kategorię') }}
    </a>
    <a class="btn btn-primary" href="{{ route('deleteCategory', $category->id) }}">
            {{ __('Usuń kategorię') }}
    </a>
    @endif
</x-app-layuout>