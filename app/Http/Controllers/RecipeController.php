<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function landingPage()
    {

        $top_recipe = Recipe::where('isActive', 1)->inRandomOrder()->limit(1)->get();

        $recipe = Recipe::where('isActive', 1)->orderBy('id', 'desc')->limit(3)->get();
        
        return view('pages.home.index', compact('recipe', 'top_recipe'));
    }

    public function addRecipePage()
    {
        $category = Category::all();
        return view("pages.home.add", compact('category'));
    }

    public function listRecipePage()
    {
        $recipe = Recipe::all();
        return view("pages.home.list", compact('recipe'));
    }

    public function detailRecipePage($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view("pages.home.detail", compact('recipe'));
    }

    public function addRecipe()
    {   
        $data = request()->validate([
            'title' => 'required',
            'ingredients' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'kategori' => 'required',
        ]);

        $file = request('photo');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $fileName);

        Recipe::create([
            'title' => $data['title'],
            'ingridients' => $data['ingredients'],
            'photo' => $fileName,
            'categoryId' => $data['kategori'],
            'userId' => Auth::user()->id,
            'isActive' => 0,
        ]);

        return redirect('/')->with('success', 'Recipe added successfully!');
    }
}
