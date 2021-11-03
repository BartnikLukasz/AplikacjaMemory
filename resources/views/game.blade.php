<x-app-layout>
    <?php
        $pictures = array_merge($pictures, $pictures);
        shuffle($pictures);
        $i = 0;
        $link = "link";
    ?>
<style>
    .left-buttons{
        display: none !important;
    }
</style>

<script>

</script>

    <div class="game-container">
        <div class="row game-container-row">
            <div class="col-3">
                <div class="row category-row main-panel category-name">
                    <div class="col-12 category-name-inner">
                        <h4 class="m-0"><span class="text-uppercase" style="font-weight: 400;">Kategoria:</span><br>{{ $categoryName }}</h4>
                    </div>
                </div>
                <div class="row points-row main-panel">
                    <div class="col-12">
                        <div class="game-info-single">
                            <h4 class="info-border">{{ $level }}</h4>
                            <h4 class="bottom-info-border">Poziom</h4>
                        </div>
                        <div class="game-info-single">
                            <h4 class="info-border" id="timer">0:00</h4>
                            <h4 class="bottom-info-border">Czas</h4>
                        </div>
                        <div class="game-info-single">
                            <h4 class="info-border" id="moves">0</h4>
                            <h4 class="bottom-info-border">Liczba prób</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div id="game" class="card-container main-panel">
                    @if(count($pictures) == 6)
                        @for ($k = 0; $k < 2; $k++)
                            <div class="row three-card-row">
                                @for ($j = 0; $j < 3; $j++)
                                    <div class="col-4 p-3">
                                        <div class="game-card card-{{ $i }}" data-url="url('{{asset($pictures[$i][$link])}}')"></div>
                                    </div>
                                    <?php $i++; ?>
                                @endfor
                            </div>
                        @endfor
                    @endif
                    <a href="#"><div class="report-button">Zgłoś kategorię</div></a>
                </div>
                <div id="end-game-form" style="display: none">
                    <form method="post" action="{{ route('endGame') }}">
                    @csrf
                        <input type="text" id="time" name="time" value="" hidden/>
                        <input type="number" id="levelDifficultySend" name="levelDifficulty" value="{{ $level }}" hidden/>
                        <input type="number" id="multiplier" name="multiplier" value="{{ $multiplier }}" hidden/>
                        <input type="text" id="score" name="score" value="" hidden/>
                        <p id="timeP">Czas gry: </p>
                        <p id="numberOfMovesP">Liczba ruchów: </p>
                        <p id="scoreP">Zdobyte punkty: </p>
                        <input type="submit" class="button d-inline add-category-button" name='submit_game' value="Zakończ"/>
                    </form>
                </div>
            </div>
        </div>
    </div>



<a class="back-button-container text-center text-decoration-none" href="{{ route('dashboard') }}">
    <div class="back-button button mt-4">{{ __('Wyjdź z gry') }}</div>
</a>



</x-app-layuout>