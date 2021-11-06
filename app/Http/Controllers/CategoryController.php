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

    public function reportCategory($categoryName){
        Category::where('name', $categoryName)->update(['reported'=>1]);
        return view("dashboard");
    }

    public function store($upload, $categoryId, $categoryTitle, $word, $i){
        if(Picture::where('word', $word)->where('category_id', $categoryId)->exists()) return;
        session_start();
        $picture = new Picture();
        $picture->category_id = $categoryId;
        $picture->word = $word;
        $path = '/pictures/'.$categoryTitle.'_'.$word.'.jpg';
        $path = str_replace('\\', '/', $path);
        $picture->link = $path;
        $picture->save();
        move_uploaded_file($upload[$i]["tmp_name"], public_path().$path);
        session_destroy();
    }

    public function addCategory(Request $request){
        if(Auth::user()==null){
            return view('login');
        }
        $category = null;
        if(isset($request->oldTitle)){
            if($request->oldTitle != $request->title){
                $category = Category::where('name', $request->oldTitle)->update(['name'=>$request->title]);
            }
            else{
                $category = Category::where('name', $request->oldTitle)->first();
            }
        }
        else{
            $category = Category::firstOrCreate([
                'name' => $request->title,
                'author' => Auth::user()->id,
            ]);
        }
        $category = Category::where('name', $request->title)->first();
        $upload = $this->incoming_files();
        $i = 0;
        foreach($request->words as $word){
            $this->store($upload, $category->id, $category->name, $word, $i);
            $i++;
        }
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
        if(Auth::user()->isAdmin()){
            $categories = Category::orderBy('id', 'asc')->get();
            return view("panel.controlPanelCategories", compact('categories'));
        }
        else{
            return $this->create(Auth::user()->id);
        }
    }

    function incoming_files() {
        $files = $_FILES;
        $files2 = [];
        foreach ($files as $input => $infoArr) {
            $filesByInput = [];
            foreach ($infoArr as $key => $valueArr) {
                if (is_array($valueArr)) { // file input "multiple"
                    foreach($valueArr as $i=>$value) {
                        $filesByInput[$i][$key] = $value;
                    }
                }
                else { // -> string, normal file input
                    $filesByInput[] = $infoArr;
                    break;
                }
            }
            $files2 = array_merge($files2,$filesByInput);
        }
        $files3 = [];
        foreach($files2 as $file) { // let's filter empty & errors
            if (!$file['error']) $files3[] = $file;
        }
        return $files3;
    }

}