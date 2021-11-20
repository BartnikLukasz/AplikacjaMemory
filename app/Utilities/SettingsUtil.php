<?php

namespace App\Utilities;

use App\Models\User;
use App\Models\UnlockCategory;
use App\Models\SingleGame;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsUtil{

    public static function checkNickname($nickname){
        return $nickname == Auth::user()->nickname;
    }

    public static function checkPassword($password){
        return Hash::check($password, Auth::user()->password);
    }

    public static function changeNickname($nickname){
        $user = User::find(Auth::user()->id);
        $user->nickname = $nickname;
        if($user->save()){
            return true;
        }
        return false;
    }

    public static function changePassword($password){
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($password);
        $user->save();
    }

    public static function resetAccount(){
        $user = User::find(Auth::user()->id);
        UnlockCategory::where('user_id', $user->id)->delete();
        SingleGame::where('user_id', $user->id)->delete();
        $user->position = User::count()+1;
        $user->ranking_points = 0;
        $user->save();
        UnlockCategoryUtil::unlockCategoryOnRegistration($user->id);
    }

    public static function deleteAccount(){
        $user = User::find(Auth::user()->id);
        $user->deleted = 1;
        $user->save();
    }

}