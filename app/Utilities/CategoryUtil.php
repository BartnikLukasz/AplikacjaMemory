<?php

namespace App\Utilities;

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Picture;
use App\Models\UnlockCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryUtil{

    public static function getCategoryForRequest(Request $request){
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
        return $category;
    }

    public static function validateEmptyRequest(Request $request, $categoryId){

        if($request->words!=null){
            if((sizeof($request->words)+Picture::where('category_id', $categoryId)->count())<10){
                CategoryUtil::deleteCategory($categoryId);
                return false;
            }
        }elseif(Picture::where('category_id', $categoryId)->count()<10){
            CategoryUtil::deleteCategory($categoryId);
            return false;
        }
        return true;
    }

    public static function storePictures($upload, $categoryId, $categoryName, $words){
        if($words!=null){
            $i=0;
            foreach($words as $word){
                CategoryUtil::store($upload, $categoryId, $categoryName, $word, $i);
                $i++;
            }
        }
    }

    public static function deleteCategory($id){
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
        UnlockCategory::where('category_id', $id)->delete();
        Category::destroy($id);
    }

    public static function deleteImage($id){
        $picture = Picture::find($id);
        if(Picture::where('category_id', $picture->category_id)->count()<10){
            return false;
        }
        $url = public_path().$picture->link;
        try {
            unlink($url);
        } catch (\Exception $e) {

        }
        Picture::destroy($id);
        return $picture;
    }

    private static function store($upload, $categoryId, $categoryTitle, $word, $i){
        if(Picture::where('word', $word)->where('category_id', $categoryId)->exists()) return;
        session_start();
        $picture = new Picture();
        $picture->category_id = $categoryId;
        $picture->word = $word;
        if(!is_dir(public_path().'/pictures/'.$categoryTitle)) mkdir(public_path().'/pictures/'.$categoryTitle);
        $path = '/pictures/'.$categoryTitle.'/'.$word.'.jpg';
        $path = str_replace('\\', '/', $path);
        $picture->link = $path;
        $picture->save();
        move_uploaded_file($upload[$i]["tmp_name"], public_path().$path);
        session_destroy();
    }

    public static function validateImagesSize($upload){
       /* foreach($upload as $file){
            if($file["size"]>1048576){
                return false;
            }
        } */
        return true;
    }

}