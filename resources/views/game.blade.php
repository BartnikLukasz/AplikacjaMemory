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
                <div class="row category-row main-panel">
                    <div class="col-12">
                        <h4 class="text-uppercase">Kategoria: {{ $categoryName }}</h4>

                    </div>
                </div>
                <div class="row points-row main-panel">
                    <div class="col-12">
                        <h5>Poziom: {{ $level }}</h5>
                        <h5 id="timer">Czas: 0</h5>
                        <h5 id="moves">Liczba ruchów: 0</h5>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card-container main-panel">
                    <div class="row card-row">
                        <div class="col-3 game-card card-1"></div>
                        <div class="col-3 game-card card-2"></div>
                        <div class="col-3 game-card card-3"></div>
                        <div class="col-3 game-card card-4"></div>
                    </div>

                    <div class="row card-row">
                        <div class="col-3 game-card card-5"></div>
                        <div class="col-3 game-card card-6"></div>
                        <div class="col-3 game-card card-7"></div>
                        <div class="col-3 game-card card-8"></div>
                    </div>

                    <div class="row card-row">
                        <div class="col-3 game-card card-9"></div>
                        <div class="col-3 game-card card-10"></div>
                        <div class="col-3 game-card card-11"></div>
                        <div class="col-3 game-card card-12"></div>
                    </div>
                </div>
            </div> 
            <!--<div class="col-9">
                <div class="card-container main-panel">
                    @if(count($pictures) == 6)
                        @for ($k = 0; $k < 2; $k++)
                            <div class="row card-row">
                                @for ($j = 0; $j < 3; $j++)
                                    <div class="col-3 game-card card-{{ $i }}" style="background-image: url('{{asset($pictures[$i][$link])}}')"></div>
                                    <?php $i++; ?>
                                @endfor
                            </div>
                        @endfor
                    @endif
                </div>
            </div>-->
        </div>
    </div>



<a class="back-button-container text-center text-decoration-none" href="{{ route('dashboard') }}">
    <div class="back-button button">{{ __('Wyjdź z gry') }}</div>
</a>



</x-app-layuout>