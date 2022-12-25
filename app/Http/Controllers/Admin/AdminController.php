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
        $user = User::where('role', 'user')->get()->groupBy('isActive')->map(function ($item) {
            return $item->count();
        });

        $recipe = Recipe::get()->groupBy('isActive')->map(function ($item) {
            return $item->count();
        });

        $recipe[1] = $recipe[1] ?? 0;
        $recipe[0] = $recipe[0] ?? 0;
        
        $user_non_active = User::where('role', 'user')->where('isActive', 0)->get();

        $category = Category::all()->count();

        return view('pages.admin.dashboard', compact('user', 'recipe', 'category', 'user_non_active'));
    }

    public function userPage()
    {
        $users = User::where('role', 'user')->get();

        return view('pages.admin.user', compact('users'));
    }

    public function categoryPage()
    {
        $categories = Category::all();

        return view('pages.admin.category', compact('categories'));
    }

    public function recipePage()
    {
        $recipes = Recipe::with('user', 'category')->get();

        return view('pages.admin.recipe', compact('recipes'));
    }


    public function putUserStatus($id)
    {
        $user = User::findOrFail($id);

        $user->Update([
            'isActive' => $user->isActive == 0 ? 1 : 0
        ]);

        return back()->with('success', 'Berhasil mengubah status user!');
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);

        $user->delete();

        return back()->with('success', 'Berhasil menghapus user!');
    }

    public function postCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Berhasil menambahkan kategori!');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return back()->with('success', 'Berhasil menghapus kategori!');
    }


    public function putCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::findOrFail($id);

        $category->Update([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Berhasil mengubah status kategori!');
    }

    public function putRecipeStatus($id)
    {
        $recipe = Recipe::findOrFail($id);

        $recipe->Update([
            'isActive' => $recipe->isActive == 0 ? 1 : 0
        ]);

        return back()->with('success', 'Berhasil mengubah status resep!');
    }

    public function deleteRecipe($id)
    {
        $recipe = Recipe::findOrFail($id);

        $recipe->delete();

        return back()->with('success', 'Berhasil menghapus resep!');
    }
}
