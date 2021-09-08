
<x-app-layout>
    <h2>Tablica rankingu</h2>
    <div>
    <ol class="list-unstyled mb-0">
            @foreach ($users as $user)
          <li>{{$user}}</li>
          @endforeach
        </ol>
    </div>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layout>