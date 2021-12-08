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
use Illuminate\Support\Facades\DB;
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
        $categoriesDefault = DB::table('category')
                                ->join('user', 'user.id', '=', 'category.author')
                                ->where('category.status', 1)
                                ->where('user.role_id', 2)
                                ->select('category.id', 'category.name', 'category.author')
                                ->get();
                            
        $categoriesUser = DB::table('category')
                                ->join('user', 'user.id', '=', 'category.author')
                                ->where('category.status', 1)
                                ->where('user.role_id', 1)
                                ->select('category.id', 'category.name', 'category.author')
                                ->get();

        $picturesDefault = [];
        $picturesUser = [];

        $i = 0;
        foreach($categoriesDefault as $category){
            $picturesDefault[$i] = Picture::where('category_id', $category->id)->first()->link;
            $i++;
        }
        $i = 0;
        foreach($categoriesUser as $category){
            $picturesUser[$i] = Picture::where('category_id', $category->id)->first()->link;
            $i++;
        }
        $level = $difficulty;
        return view('chooseCategory', compact('categoriesDefault', 'categoriesUser', 'level', 'unlockedCategoriesId', 'picturesDefault', 'picturesUser'));
    }

    public function chooseDifficulty(){
        $points = Auth::user()->ranking_points;
        return view(('chooseDifficulty'), compact('points'));
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

    public function reportCategory($categoryName){
        Category::where('name', $categoryName)->update(['reported'=>1]);
        return $this->chooseDifficulty();
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
