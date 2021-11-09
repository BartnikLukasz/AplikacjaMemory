<x-app-layout>
<style>
    .left-buttons{
        display: none !important;
    }
</style>
    <div class="row justify-content-evenly control-panel-row">
        @include('panel.controlPanelMenu')
        <div class="control-panel col-8 main-panel">
            <h4 class="mb-3 text-center">{{ __('Zgłoszone kategorie') }}</h4>
            <div class="table-container">
                <table class="table table-striped">
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
                    @foreach($reportedCategories as $category)
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
                            <a href="{{ route('aproveCategory', $category->id) }}" >Zatwierdź </a>|
                            <a href="{{ route('hideCategory', $category->id) }}" >Ukryj </a>|
                            <a href="{{ route('editCategory', $category->id) }}" >Edytuj </a>|
                            <a href="{{ route('deleteCategory', $category->id) }}" >Usuń</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>    
    <a class="back-button-container text-center text-decoration-none " href="{{ route('dashboard') }}">
        <div class="back-button button">{{ __('Powrót') }}</div>
    </a>
</x-app-layuout>