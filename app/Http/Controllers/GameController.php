<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\LevelDifficulty;
use App\Models\UnlockCategory;
use App\Models\Picture;
use App\Models\SingleGame;
use App\Models\User;
use App\Utilities\UnlockCategoryUtil;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\VarDumper;

class GameController extends Controller
{
    public function startGame($id, $level){
        $levelDifficulty = LevelDifficulty::where('level', $level)->first();
        $multiplier = $levelDifficulty->multiplier;
        $category = Category::find($id);
        $categoryName = $category->name;
        $pictures = Picture::where('category_id', $id)->get()->toArray();
        shuffle($pictures);
        $pictures = array_slice($pictures, 0, $levelDifficulty->amount_of_pictures);
        return view('game', compact('pictures', 'categoryName', 'level', 'multiplier'));
    }

    public function chooseCategory($difficulty){
        $unlockedCategoriesId = UnlockCategory::where('user_id', Auth::user()->id)->get()->pluck('category_id')->toArray();
        $categories = Category::where('status', 1)->get();
        $pictures = [];
        $i = 0;
        foreach($categories as $category){
            $pictures[$i] = Picture::where('category_id', $category->id)->first()->link;
            $i++;
        }
        $level = $difficulty;
        return view('chooseCategory', compact('categories', 'level', 'unlockedCategoriesId', 'pictures'));
    }

    public function chooseDifficulty(){
        return view(('chooseDifficulty'));
    }

    public function endGame(Request $request){

        SingleGame::create([
            'time' => $request->time,
            'level_difficulty_id' => $request->levelDifficulty,
            'user_id' => Auth::user()->id,
            'scores' => $request->score
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->ranking_points += $request->score;
        $user->save();

        UnlockCategoryUtil::unlockCategory();
        return view('dashboard');
    }

    public function playQuickGame(){
        $categories = Category::all()->toArray();
        $key = array_rand($categories);
        $category = $categories[$key];
        $id = $category['id'];
        $categoryName = $category['name'];
        $level = rand(1, 3);
        $levelDifficulty = LevelDifficulty::where('level', $level)->first();
        $multiplier = $levelDifficulty->multiplier;
        $pictures = Picture::where('category_id', $id)->get()->toArray();
        shuffle($pictures);
        $pictures = array_slice($pictures, 0, $levelDifficulty->amount_of_pictures);
        return view('quickGame', compact('pictures', 'categoryName', 'level', 'multiplier'));
    }
}
