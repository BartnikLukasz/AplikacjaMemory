<x-app-layout>
<style>
    .left-buttons{
        display: none !important;
    }
</style>

    <div class="main-panel" id="choose-difficulty">

        <div class="row">
            <div class="col-4">
                <a class="difficult-button easy mx-2" href="{{ route('chooseCategory', 1) }}">
                    <span class="main-text">{{ __('Łatwy') }}</span>
                    <span class="description">{{ __('3 pary') }}</span>
                </a>
            </div>

            <div class="col-4">
                <a class="difficult-button medium mx-2" href="{{ route('chooseCategory', 2) }}">
                    <span class="main-text">{{ __('Średni') }}</span>
                    <span class="description">{{ __('6 par') }}</span>
                </a>
            </div>

            <div class="col-4">
                <a class="difficult-button hard mx-2" href="{{ route('chooseCategory', 3) }}">
                    <span class="main-text">{{ __('Trudny') }}</span>
                    <span class="description">{{ __('10 par') }}</span>
                </a>
            </div>

        </div>

        <a class="back-button-container text-center" href="{{ route('dashboard') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>

    </div>
    <script>
        $(document).ready(function(){
            
           // if({{-- $chooseDifficulty->points --}} == 0){
           //     $('.tutorial').css("display", "flex");
          // } 
            
        });
    </script>
    <div class="tutorial">
        <h3 class="text-center mb-4">Jak grać?</h3>
        <div class="tutorial-text">
            <p style="text-align:justify;">Gra polega na odnajdywaniu par wśród kart wyświetlonych na ekranie. Wszystkie obrazki zawierają podpisy, które pozwalają dzieciom uczyć się nowych słów.<br><br>
                Do wyboru dostępne są 3 poziomy trudności oraz wiele kategorii, które możesz odblokować poprzez ukończenie kolejnych rozgrywek. Po odblokowaniu
                wszystkich kategorii domyślnych otrzymasz możliwość rozgrywania tych utworzonych przez użytkowników aplikacji. Masz również możliwość utworzenia swoich własnych kategorii! <br><br>
                Każda pełna rozgrywka dzieli się na 3 części, które różnią się sposobem przedstawiania obrazków i słów. Po ukończeniu ich wszystkich otrzymasz
                informację z ilością zdobytych punktów. Możesz śledzić swoje wyniki w zakładce Statystyki oraz sprawdzić swoją pozycję w rankingu.<br><br>
                <span style="font-size:1.1em">Dobrej zabawy!</span>
                </p>
        </div>
        <div class="tutorial-close button mt-4">Ok, przeczytałem!</div>
    </div>

</x-app-layuout>