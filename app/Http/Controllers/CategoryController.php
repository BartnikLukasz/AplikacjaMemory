<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function create($id){
        $user = User::find($id);
        $categories = $user->category()->get();
        return view('userCategories', compact('categories'));
    }

    public function createOne($id){
        $category = Category::find($id);
        return view('category', compact('category'));
    }

    public function add(){
        return view('addCategory');
    }

    public function edit($id){
        $category = Category::find($id);
        if(Auth::user()->id != $category->author){
            return view('dashboard');
        }
        return view('addCategory', compact('category'));
    }

    public function store(Request $request){

    }

    public function delete($id){
        $category = Category::find($id);
        if(Auth::user()->id != $category->author){
            return view('dashboard');
        }
        Category::destroy($id);
        create(Auth::user()->id);
    }
}
