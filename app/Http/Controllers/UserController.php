<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

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
        $users = User::where('position', '>', '0')->orderBy('position', 'asc')->get();
        return view('ranking', compact('users'));
    }
}