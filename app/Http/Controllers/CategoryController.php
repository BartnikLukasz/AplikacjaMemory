<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Picture;
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
        if(Auth::user()->id != $category->author){
            return view('dashboard');
        }
        return view('addCategory', compact('category'));
    }

    public function store(Request $request){
        session_start();
        if(Auth::user()==null){
            return view('login');
        }
        $category = Category::where('name', $request->title)->first();
        if(!$category){
            $category = Category::create([
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
        if(Auth::user()->id != $category->author){
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
    /*$files3 = [];
    foreach($files2 as $file) { // let's filter empty & errors
        if (!$file['error']) $files3[] = $file;
    }*/
    var_dump($files2);
    return $files2;
}