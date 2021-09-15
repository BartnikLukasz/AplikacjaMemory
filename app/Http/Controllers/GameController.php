<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function startGame(){
        return view(('game'));
    }

    public function chooseCategory(){
        $categories = Category::orderBy('id', 'asc')->get();
        return view('chooseCategory', compact('categories'));
    }

    public function chooseDifficulty(){
        return view(('chooseDifficulty'));
    }
}
