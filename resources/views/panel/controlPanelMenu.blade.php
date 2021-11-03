<div class="col-3 main-panel d-flex flex-column text-center">

    <a class="button" href="{{ route('controlPanelUsers') }}">
        {{ __('Użytkownicy') }}
    </a>
    <a class="button" href="{{ route('controlPanelLevelDifficulties') }}">
        {{ __('Ustawienia punktacji') }}
    </a>
    <a class="button" href="{{ route('controlPanelCategories') }}">
        {{ __('Zarządzanie kategoriami') }}
    </a>
    <a class="button"  href="{{ route('controlPanelReportedCategories') }}">
        {{ __('Zgłoszone kategorie') }}
    </a>

</div>