<x-app-layout>
<style>
    .left-buttons{
        display: none !important;
    }
</style>
    <div class="row justify-content-evenly control-panel-row">
        @include('panel.controlPanelMenu')
        <div class="control-panel col-8 main-panel">
            <h4 class="mb-3 text-center">{{ __('Informacje o użytkownikach') }}</h4>
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
                            E-mail
                        </th>
                        <th>
                            Data dołączenia
                        </th>
                        <th>
                            Usunięto
                        </th>
                        <th>
                            Opcje
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
                        <td>
                            <?php if( $user->deleted == 1): ?>
                            {{ __('Tak') }}
                            <?php else: ?>
                            {{ __('Nie') }}
                            <?php endif ?>
                        </td>
                        <td>
                            <a href="{{ route('controlPanelRenameUser', $user->id) }}" >Zmień nazwę </a>|
                            <a href="{{ route('controlPanelChangeUserPassword', $user->id) }}" >Zmień hasło </a>|
                            <a href="{{ route('controlPanelDeleteUser', $user->id) }}" >Usuń</a>
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