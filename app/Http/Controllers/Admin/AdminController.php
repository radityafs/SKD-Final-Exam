<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = User::all();
        $recipe = Recipe::all();
        $category = Category::all();
        return view('pages.admin.dashboard', compact('user', 'recipe', 'category'));
    }
}
