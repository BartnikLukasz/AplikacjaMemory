<?php
    use Illuminate\Support\Facades\Auth;
?>
<x-app-layout>
    <div>
        @foreach($category->picture()->get() as $picture)
            {{$picture->link}}
            {{$picture->word}}
            </br>
        @endforeach
    </div>
    {{ Auth::user()->id }}
    {{ $category->user_id }}
    @if(Auth::user()->id == $category->author)
    <a class="btn btn-primary" href="{{ route('editCategory', $category->id) }}">
            {{ __('Edytuj kategorię') }}
    </a>
    <a class="btn btn-primary" href="{{ route('deleteCategory', $category->id) }}">
            {{ __('Usuń kategorię') }}
    </a>
    @endif
</x-app-layuout>