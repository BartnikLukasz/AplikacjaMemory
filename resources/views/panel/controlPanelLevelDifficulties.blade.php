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
                    <a href="{{ route('controlPanelChangeLevel', $levelDifficulty->id) }}" >Edit</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layuout>