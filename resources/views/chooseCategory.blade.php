<x-app-layout>
    <div>
        Category choice screen
        @foreach ($categories as $category)
        <a class="btn btn-primary" href="{{ route('game') }}">
            {{ $category->name }}
        </a>
        @endforeach
        </div>
        <a class="btn btn-primary" href="{{ route('chooseDifficulty') }}">
            {{ __('Powrót') }}
        </a>
    </div>
</x-app-layuout>