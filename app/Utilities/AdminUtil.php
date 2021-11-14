<?php

namespace App\Utilities;

use App\Models\LevelDifficulty;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUtil{

    public static function changePassword($request){
        if(AdminUtil::isAuthorized()){
            $user = User::find($request->id);
            $user->password = Hash::make($request->password);
            $user->save();
        }
    }

    public static function changeUsername($request){
        if(AdminUtil::isAuthorized()){
            $user = User::find($request->id);
            $user->nickname = $request->nickname;
            $user->save();
        }
    }

    public static function deleteUser($id){
        if(AdminUtil::isAuthorized()){
            $user = User::find($id);
            $user->deleted = 1;
            $user->save();
        }
    }

    public static function changeLevelDifficulty($request){
        if(AdminUtil::isAuthorized()){
            $levelDifficulty = LevelDifficulty::find($request->id);
            $levelDifficulty->multiplier = $request->multiplier;
            $levelDifficulty->save();
        }
    }

    public static function approveCategory($id){
        if(AdminUtil::isAuthorized()){
            $category = Category::find($id);
            $category->reported = 0;
            $category->status = 1;
            $category->save();
        }
    }

    public static function hideCategory($id){
        if(AdminUtil::isAuthorized()){
            $category = Category::find($id);
            $category->status = 0;
            $category->save();
        }
    }

    private static function isAuthorized(){
        return Auth::user()->isAdmin();
    }
}