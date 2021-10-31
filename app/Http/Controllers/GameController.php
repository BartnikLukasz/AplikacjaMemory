<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\LevelDifficulty;
use App\Models\Picture;
use App\Models\SingleGame;
use App\Models\User;
use App\Utilities\UnlockCategoryUtil;
use Illuminate\Support\Facades\Auth;

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
        $categories = Category::orderBy('id', 'asc')->get();
        $level = $difficulty;
        return view('chooseCategory', compact('categories', 'level'));
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
}
