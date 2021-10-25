<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Picture;
use DB;
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
        $category = null;
        return view('addCategory', compact('category'));
    }

    public function edit($id){
        $category = Category::find($id);
        if((Auth::user()->id != $category->author) && !Auth::user()->isAdmin()){
            return view('dashboard');
        }
        return view('addCategory', compact('category'));
    }

    public function store(Request $request){
        session_start();
        if(Auth::user()==null){
            return view('login');
        }

        if(isset($request->oldTitle)){
            if($request->oldTitle != $request->title){
                Category::where('name', $request->oldTitle)->update(['name'=>$request->title]);
            }
        } else{
            Category::create([
                'name' => $request->title,
                'author' => Auth::user()->id,
            ]);
        }
        $category = Category::where('name', $request->title)->first();
        $upload = $_FILES["upload_file"]["tmp_name"];
        $picture = new Picture();
        $picture->category_id = $category->id;
        $picture->word = $request->word;
        $path = '/pictures/'.$request->title.'_'.$picture->word.'.jpg';
        $path = str_replace('\\', '/', $path);
        $picture->link = $path;
        $picture->save();
        move_uploaded_file($upload, public_path().$path);
        return $this->edit($category->id);
    }

    public function delete($id){
        $category = Category::find($id);
        if((Auth::user()->id != $category->author) && (!Auth::user()->isAdmin())){
            return view('dashboard');
        }
        $pictures = Picture::where('category_id', $id)->get();
        foreach($pictures as $picture){
            $url = public_path().$picture->link;
            try {
                unlink($url);
            } catch (\Exception $e) {

            }
        }
        Picture::where('category_id', $id)->delete();
        Category::destroy($id);
        return $this->create(Auth::user()->id);
    }

    public function deleteImage($id){
        $picture = Picture::find($id);
        $url = public_path().$picture->link;
        try {
            unlink($url);
        } catch (\Exception $e) {

        }
        Picture::destroy($id);
        return $this->edit($picture->category_id);
    }

    public function endCreation($id){
        if(Auth::user()->isAdmin()){
            $categories = Category::orderBy('id', 'asc')->get();
            return view("panel.controlPanelCategories", compact('categories'));
        }
        else{
            return $this->create(Auth::user()->id);
        }
    }

    public function cancelCreation($id){
        $this->delete($id);
        if(Auth::user()->isAdmin()){
            $categories = Category::orderBy('id', 'asc')->get();
            return view("panel.controlPanelCategories", compact('categories'));
        }
        else{
            return $this->create(Auth::user()->id);
        }
    }
}