<x-app-layout>
    <div>
        Twoje kategorie
        @foreach($categories as $category)
        <a class="btn btn-primary" href="{{ route('category', $category->id) }}">
            {{ $category->name }}
        </a>
        @endforeach
        <a class="btn btn-primary" href="{{ route('game') }}">
            {{ __('Dodaj nową kategorię') }}
        </a>
        </div>
        <a class="btn btn-primary" href="{{ route('dashboard') }}">
            {{ __('Powrót') }}
        </a>

    </div>
</x-app-layuout>