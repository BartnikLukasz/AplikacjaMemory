<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ranking()
    {
        $users = User::orderBy('ranking_points', 'desc')->get();
        var_dump($users);
        $i = 1;
        foreach($users as $user){
            $user->position = $i;
            $user->save();
            $i++;
        }
        return view('ranking', compact('users'));
    }

    public function createInformation(){
        return view('information');
    }

}
