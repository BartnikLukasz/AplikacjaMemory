<?php

namespace App\Utilities;

use App\Models\User;

class UserUtil{

    public static function ranking(){
        $users = User::where('deleted', 0)->where('role_id', 1)->orderBy('ranking_points', 'desc')->get();
        for($i = 1; $i<=count($users); $i++){
            $users[$i-1]->position = $i;
        }
        foreach($users as $user){
            User::where('position', $user->position)->where('id', '!=', $user->id)->update(['position' => null]);
            $user->save();
        }
    }
}