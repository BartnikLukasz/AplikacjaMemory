<x-app-layout>
    <?php
        $tempArray = [];
        $i = 0;
    ?>
<style>
    .left-buttons{
        display: none !important;
    }
</style>

    <div class="main-panel w-75 categories" id="choose-category">
        <div class="categories-container">
            <div class="row">
                @foreach ($categories as $category)
                    @if(in_array($category->id, $unlockedCategoriesId)) 
                    <div class="col-2 mb-2">
                        <a href="{{ route('startGame', [$category->id, $level]) }}" class="text-decoration-none">
                            <div class="one-category" style="background-image: url('{{asset($pictures[$i])}}');"></div>
                            <p class="category-title text-center mt-2">{{ $category->name }}</p>
                        </a>
                        <?php
                        array_push($tempArray, $category->id);
                        ?>
                    </div>
                    @endif
                    <?php
                        $i++;
                    ?>
                @endforeach
                <?php
                    $i=0;
                    ?>
                @foreach ($categories as $category)
                    @if(!in_array($category->id, $tempArray)) 
                        <div class="col-2 mb-2">
                            <a class="text-decoration-none" style="opacity:0.5">
                                <div class="one-category" style="background-image: url('{{asset($pictures[$i])}}');"></div>
                                <p class="category-title text-center mt-2">{{ $category->name }}</p>
                            </a>
                        </div>
                    @endif
                    <?php
                        $i++;
                    ?>
                @endforeach
            </div>
        </div>
        <a class="back-button-container text-center" href="{{ route('chooseDifficulty') }}">
            <div class="back-button button">{{ __('Powrót') }}</div>
        </a>
    </div>

</x-app-layuout>