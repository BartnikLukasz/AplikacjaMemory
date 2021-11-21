<?php

namespace App\Utilities;

use App\Models\Category;
use App\Models\LevelDifficulty;
use App\Models\UnlockCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $newUnlockedCategory = DB::table('category')
                                ->join('user', 'user.id', '=', 'category.author')
                                ->where('category.status', 1)
                                ->where('user.role_id', 2)
                                ->whereNotIn('category.id', $categoryIds)
                                ->select('category.id', 'category.name', 'category.author')
                                ->first();

        if($newUnlockedCategory){
            UnlockCategory::create([
                'user_id' => $user_id,
                'category_id' => $newUnlockedCategory->id
            ]);
        }
    }

    public static function unlockCategoryOnRegistration($id){
        $categories = DB::table('category')
                            ->join('user', 'user.id', '=', 'category.author')
                            ->where('category.status', 1)
                            ->where('user.role_id', 2)
                            ->select('category.id', 'category.name', 'category.author')
                            ->take(3)
                            ->get();
                                    
        foreach($categories as $category){
            UnlockCategory::create([
                'user_id' => $id,
                'category_id' => $category->id
            ]);
        }
    }

}