<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilities\SettingsUtil;

class SettingsController extends Controller
{
    public function createChangeUsername(){
        return view('changeUsername');
    }

    public function changeUsername(Request $request){
        if(SettingsUtil::checkNickname($request->oldNickname) && SettingsUtil::checkPassword($request->password)){
            SettingsUtil::changeNickname($request->newNickname);
        }
        return view('settings');
    }

    public function createChangePassword(){
        return view('changePassword');
    }

    public function changePassword(Request $request){
        if(SettingsUtil::checkPassword($request->oldPassword)){
            SettingsUtil::changePassword($request->newPassword);
        }
        return view('settings');
    }

    public function createReset(){
        return view('reset');
    }

    public function reset(Request $request){
        if(SettingsUtil::checkPassword($request->password)){
            SettingsUtil::resetAccount();
        }
        return view('settings');
    }

    public function createDelete(){
        return view('delete');
    }

    public function delete(Request $request){
        if(SettingsUtil::checkPassword($request->password)){
            SettingsUtil::deleteAccount();
        }
        return redirect()->route('logoutUser');
    }



}
