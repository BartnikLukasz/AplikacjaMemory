<?php

namespace App\Utilities;

use App\Models\Category;
use App\Models\LevelDifficulty;
use App\Models\UnlockCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UnlockCategoryUtil{

    public static function unlockCategory(){
        $user_id = Auth::user()->id;

        $unlockedCategories = UnlockCategory::where('user_id', $user_id)->get();

        $categoryIds = [];
        $i = 0;
        foreach($unlockedCategories as $unlockedCategory){
            $categoryIds[$i] = $unlockedCategory->category_id;
            $i++;
        }

        $newUnlockedCategoryId = Category::whereNotIn('id', $categoryIds)->first()->id;

        UnlockCategory::create([
            'user_id' => $user_id,
            'category_id' => $newUnlockedCategoryId
        ]);
    }

}