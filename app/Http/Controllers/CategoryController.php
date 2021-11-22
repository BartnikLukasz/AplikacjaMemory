<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Picture;
use App\Models\UnlockCategory;
use App\Utilities\CategoryUtil;
use DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function create($id){
        $user = User::find($id);
        $categories = $user->category()->get();
        $pictures = [];
        $i = 0;
        foreach($categories as $category){
            $pictures[$i] = Picture::where('category_id', $category->id)->first()->link;
            $i++;
        }
        return view('userCategories', compact('categories', 'pictures'));
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
        return view("chooseDifficulty");
    }

    public function addCategory(Request $request){
        if(Auth::user()==null){
            return view('login');
        }

        $upload = $this->incoming_files();

        if(!CategoryUtil::validateImagesSize($upload)){
            return back()->withErrors(["picturesTooHeavy"=>__('validation.picturesTooHeavy')]);
        }

        $category = CategoryUtil::getCategoryForRequest($request);
        if(!CategoryUtil::validateEmptyRequest($request, $category->id)){
            return back()->withErrors(["morePicturesNeeded"=>__('validation.morePicturesNeeded')]);
        }
        
        CategoryUtil::storePictures($upload, $category->id, $category->name, $request->words);
       
        return $this->edit($category->id);
    }

    public function delete($id){
        CategoryUtil::deleteCategory($id);
        return $this->create(Auth::user()->id);
    }

    public function deleteImage($id){
        $picture = CategoryUtil::deleteImage($id);
        if($picture == false){
            return back()->withErrors(["morePicturesNeeded"=>__('validation.morePicturesNeeded')]);
        }
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
                if (is_array($valueArr)) { 
                    foreach($valueArr as $i=>$value) {
                        $filesByInput[$i][$key] = $value;
                    }
                }
                else { 
                    $filesByInput[] = $infoArr;
                    break;
                }
            }
            $files2 = array_merge($files2,$filesByInput);
        }
        $files3 = [];
        foreach($files2 as $file) { 
            if (!$file['error']) $files3[] = $file;
        }
        return $files3;
    }

}