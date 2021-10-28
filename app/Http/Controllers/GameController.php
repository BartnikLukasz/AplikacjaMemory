<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\LevelDifficulty;
use App\Models\Picture;

class GameController extends Controller
{
    public function startGame($id, $level){
        $levelDifficulty = LevelDifficulty::where('level', $level)->first();
        $category = Category::find($id);
        $categoryName = $category->name;
        $pictures = Picture::where('category_id', $id)->get()->toArray();
        shuffle($pictures);
        $pictures = array_slice($pictures, 0, $levelDifficulty->amount_of_pictures);
        return view('game', compact('pictures', 'categoryName', 'level'));
    }

    public function chooseCategory($difficulty){
        $categories = Category::orderBy('id', 'asc')->get();
        $level = $difficulty;
        return view('chooseCategory', compact('categories', 'level'));
    }

    public function chooseDifficulty(){
        return view(('chooseDifficulty'));
    }
}
