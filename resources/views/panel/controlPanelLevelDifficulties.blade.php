<x-app-layout>
<style>
    .left-buttons{
        display: none !important;
    }
</style>
    <div class="row justify-content-evenly control-panel-row">
        @include('panel.controlPanelMenu')
        <div class="control-panel col-8 main-panel">
            <h4 class="mb-3 text-center">{{ __('Ustawienia punktacji') }}</h4>
            <div class="table-container">
                <table class="table table-striped">
                    <tr>
                        <th>
                            Id
                        </th>
                        <th>
                            Poziom
                        </th>
                        <th>
                            Ilość obrazków
                        </th>
                        <th>
                            Mnożnik
                        </th>
                        <th>
                            Opcje
                        </th>
                    </tr>
                    @foreach($levelDifficulties as $levelDifficulty)
                    <tr>
                        <td>
                            {{ $levelDifficulty->id; }}
                        </td>
                        <td>
                        {{ $levelDifficulty->level; }}
                        </td>
                        <td>
                        {{ $levelDifficulty->amount_of_pictures; }}
                        </td>
                        <td>
                        {{ $levelDifficulty->multiplier; }}
                        </td>
                        <td>
                            <a href="{{ route('controlPanelChangeLevel', $levelDifficulty->id) }}" >Edytuj</a>
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