<x-app-layout>
    <?php
        $pictures = array_merge($pictures, $pictures);
        shuffle($pictures);
        $i = 0;
        $link = "link";
        $word = "word";
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
                            <h4 class="info-border" id="gamePart">1</h4>
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
                                        <div class="game-card card-{{ $i }}" data-url="url('{{asset($pictures[$i][$link])}}')">
                                            <div class="game-card-hide"></div>
                                            <div class="word"><h3>{{$pictures[$i][$word]}}</h3></div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                @endfor
                            </div>
                        @endfor
                    @elseif(count($pictures) == 12)
                        @for ($k = 0; $k < 3; $k++)
                            <div class="row six-card-row">
                                @for ($j = 0; $j < 4; $j++)
                                    <div class="col-3 p-2">
                                        <div class="game-card card-{{ $i }}" data-url="url('{{asset($pictures[$i][$link])}}')">
                                            <div class="game-card-hide"></div>
                                            <div class="word"><h3>{{$pictures[$i][$word]}}</h3></div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                @endfor
                            </div>
                        @endfor
                    @elseif(count($pictures) == 20)
                        @for ($k = 0; $k < 4; $k++)
                            <div class="row ten-card-row">
                                @for ($j = 0; $j < 5; $j++)
                                    <div class="col-20 p-1">
                                        <div class="game-card card-{{ $i }}" data-url="url('{{asset($pictures[$i][$link])}}')">
                                            <div class="game-card-hide"></div>
                                            <div class="word"><h3>{{$pictures[$i][$word]}}</h3></div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                @endfor
                            </div>
                        @endfor
                        
                    @endif
                    <a href="{{ route('reportCategory', $categoryName) }}"><div class="report-button">Zgłoś kategorię</div></a>
                </div>
                <div id="end-game-form" style="display: none">
                    <form method="post" action="{{ route('endGame') }}">
                    @csrf
                        <input type="text" id="time" name="time" value="" hidden/>
                        <input type="number" id="levelDifficultySend" name="levelDifficulty" value="{{ $level }}" hidden/>
                        <input type="number" id="multiplier" name="multiplier" value="{{ $multiplier }}" hidden/>
                        <input type="text" id="score" name="score" value="" hidden/>
                        <p class="end-game-title">Czas gry</p>
                        <p id="timeP"></p>
                        <p class="end-game-title">Liczba ruchów</p>
                        <p id="numberOfMovesP"></p>
                        <p class="end-game-title">Zdobyte punkty</p>
                        <p id="scoreP"></p>
                        <input type="submit" class="button d-inline add-category-button" name='submit_game' value="Zapisz"/>
                    </form>
                </div>
            </div>
        </div>
    </div>



<a class="back-button-container text-center text-decoration-none" href="{{ route('dashboard') }}">
    <div class="back-button button mt-4" id="quit-game-button">{{ __('Wyjdź z gry') }}</div>
</a>



</x-app-layuout>