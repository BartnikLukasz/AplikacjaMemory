<x-app-layout>
    @include('panel.controlPanelMenu')
    <div class="control-panel">
    Informacje o kategoriach</br>
        <table>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Nazwa
                </th>
                <th>
                    Autor
                </th>
                <th>
                    Status
                </th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td>
                    {{ $category->id; }}
                </td>
                <td>
                {{ $category->name; }}
                </td>
                <td>
                {{ $category->user->nickname; }}
                </td>
                <td>
                {{ $category->status; }}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layuout>