<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create($id){
        $user = User::find($id);
        $categories = $user->category()->get();
        return view('userCategories', compact('categories'));
    }

    public function add(){
        return view('addCategory');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('addCategory', compact('category'));
    }

    public function store(Request $request){

    }

    public function delete($id){
        Category::destroy($id);
    }
}
