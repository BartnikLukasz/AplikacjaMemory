<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utilities\StatisticsUtil;
use App\Utilities\UserUtil;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function ranking()
    {
        //UserUtil::ranking(); //Włączenie ustawienia rankingu przy każdym wejściu do widoku rankingu
        $users = User::where('deleted', 0)->where('role_id', 1)->orderBy('position', 'asc')->get();
        return view('ranking', compact('users'));
    }

    public function categories($id){
        $user = User::find($id);
        $categories = $user->category()->get();
        return view('userCategories', compact('categories'));
    }

    public function statistics($id){
        $user = User::find($id);
        $statistics = new StatisticsUtil($user);
        return view('statistics', compact('statistics'));
    }

    public function settings(){
        return view('settings');
    }
}