<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\LevelDifficulty;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Utilities\AdminUtil;

class AdminController extends Controller
{
    public function create(){
        return view('panel.controlPanel');
    }

    public function createCategoriesView(){
        $categories = Category::orderBy('id', 'asc')->get();
        return view("panel.controlPanelCategories", compact('categories'));
    }

    public function createReportedCategoriesView(){
        $reportedCategories = Category::where('reported', 1)->orderBy('id', 'asc')->get();
        return view("panel.controlPanelReportedCategories", compact('reportedCategories'));
    }

    public function createUsersView(){
        $users = User::orderBy('id', 'asc')->get();
        return view("panel.controlPanelUsers", compact('users'));
    }

    public function createRenameUserView($id){
        $user = User::find($id);
        return view('panel.edit.renameUser', compact('user'));
    }

    public function createChangeUserPasswordView($id){
        $user = User::find($id);
        return view('panel.edit.changeUserPassword', compact('user'));
    }

    public function renameUser(Request $request){
        $request->validate([
            'nickname' => ['required', 'string', 'max:255', 'unique:user'],
        ]);
        AdminUtil::changeUsername($request);

        return $this->createUsersView();
    }

    public function changeUserPassword(Request $request){
        $request->validate([
            'password' => ['required', Rules\Password::defaults()],
        ]);
        AdminUtil::changePassword($request);

        return $this->createUsersView();
    }

    public function deleteUser($id){
        AdminUtil::deleteUser($id);

        return $this->createUsersView();
    }

    public function createLevelDifficultiesView(){
        $levelDifficulties = LevelDifficulty::orderBy('id', 'asc')->get();
        return view("panel.controlPanelLevelDifficulties", compact('levelDifficulties'));
    }

    public function createChangeLevelView($id){
        $oldLevelDifficulty = LevelDifficulty::find($id);
        return view('panel.edit.changeLevelDifficulty', compact('oldLevelDifficulty'));
    }

    public function changeLevelDifficulty(Request $request){
        AdminUtil::changeLevelDifficulty($request);
        return $this->createLevelDifficultiesView();
    }
    
    public function aprove($id){
        $category = Category::find($id);
        $category->reported = 0;
        $category->status = 1;
        $category->save();
        return $this->createReportedCategoriesView();
    }

    public function hide($id){
        $category = Category::find($id);
        $category->status = 0;
        $category->save();
        return $this->createReportedCategoriesView();
    }
}
