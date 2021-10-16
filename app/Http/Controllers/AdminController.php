<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function create(){
        return view('panel.controlPanel');
    }

    public function createUsersView(){
        $users = User::orderBy('id', 'asc')->get();
        return view("panel.controlPanelUsers", compact('users'));
    }

    public function createCategoriesView(){
        $categories = Category::orderBy('id', 'asc')->get();
        return view("panel.controlPanelCategories", compact('categories'));
    }

    public function createReportedCategoriesView(){
        $reportedCategories = Category::where('reported', 1)->orderBy('id', 'asc')->get();
        return view("panel.controlPanelReportedCategories", compact('reportedCategories'));
    }
}
