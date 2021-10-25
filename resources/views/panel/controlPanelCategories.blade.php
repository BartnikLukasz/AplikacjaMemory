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
                <th>
                    Opcje
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
                <td>
                    <a href="{{ route('editCategory', $category->id) }}" >Edit</a>
                    <a href="{{ route('deleteCategory', $category->id) }}" >Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layuout>