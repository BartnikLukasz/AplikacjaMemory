<x-app-layout>
    @include('panel.controlPanelMenu')
    <div class="control-panel">
    Informacje o użytkownikach</br>
        <table>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Nazwa
                </th>
                <th>
                    E-mail
                </th>
                <th>
                    Data dołączenia
                </th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>
                {{ $user->id; }}
                </td>
                <td>
                {{ $user->nickname; }}
                </td>
                <td>
                {{ $user->email; }}
                </td>
                <td>
                {{ $user->created_at; }}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <a class="btn btn-primary" href="{{ route('dashboard') }}">
        {{ __('Powrót') }}
    </a>
</x-app-layuout>