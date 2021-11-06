<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilities\SettingsUtil;
use Illuminate\Validation\Rules;
use Illuminate\Support\MessageBag;

class SettingsController extends Controller
{
    public function createChangeUsername(){
        return view('changeUsername');
    }

    public function changeUsername(Request $request){
        $request->validate([
            'newNickname' => ['required', 'string', 'max:255'],
        ]);
        if(!SettingsUtil::checkNickname($request->oldNickname)){
            return back()->withErrors(["oldNickname"=>__('auth.oldNickname')]);
        }
        if(!SettingsUtil::checkPassword($request->password)){
            return back()->withErrors(["password"=>__('auth.password')]);
        }
        if(!SettingsUtil::changeNickname($request->newNickname)){
            return back()->withErrors(["newNickname"=>__('auth.newNickname')]);
        }
            
            return view('settings');
    }

    public function createChangePassword(){
        return view('changePassword');
    }

    public function changePassword(Request $request){
        $request->validate([
            'newPassword' => ['required', Rules\Password::defaults()],
        ]);
        if(!SettingsUtil::checkPassword($request->oldPassword)){
            return back()->withErrors(["password"=>__('auth.password')]);
        }
        SettingsUtil::changePassword($request->newPassword);
        return view('settings');
    }

    public function createReset(){
        return view('reset');
    }

    public function reset(Request $request){
        if(!SettingsUtil::checkPassword($request->password)){
            return back()->withErrors(["password"=>__('auth.password')]);
        }
        SettingsUtil::resetAccount();
        return view('settings');
    }

    public function createDelete(){
        return view('delete');
    }

    public function delete(Request $request){
        if(!SettingsUtil::checkPassword($request->password)){
            return back()->withErrors(["password"=>__('auth.password')]);
        }
        SettingsUtil::deleteAccount();
        return redirect()->route('logoutUser');
    }



}
