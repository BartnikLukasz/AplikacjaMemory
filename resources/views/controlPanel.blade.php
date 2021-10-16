<?php
    use App\Models\User;
    use App\Models\Category;

    $users = User::orderBy('id', 'asc')->get();
    $categories = Category::orderBy('id', 'asc')->get();
?>
<x-app-layout>
@include('controlPanelMenu')
    <div class="control-panel">
        @section('table')
    </div>
    <div id="categories" >
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
    <div id="categoriesReported" >
        Zgłoszone kategorie</br>
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
            @if($category->isReported())
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
            @endif
            @endforeach
        </table>
    </div>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layuout>