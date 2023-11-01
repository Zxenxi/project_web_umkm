<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('home.index', compact('category'));
    }
    public function category()
    {
        $category = Category::all();
        return view('home.category.tambah_category', compact('category'));
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
        ], [
            'name' => 'Nama kategori tidak boleh kosong!',
        ]);
        $category = new Category;
        $category->name = $validateData['name'];
        $category->save();

        return redirect('/home/tambahcategory')->with('success', 'Anda telah berhasil menambahan Kategori!');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::select('id', 'name')->where('id', '<>', $id)->get();
        return view('home.category.edit_category', compact('category', 'categories'));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Nama kategori tidak boleh kosong!'
        ]);

        $category = Category::find($id);
        $category->name = $validatedData['name'];
        $category->save();

        return redirect('/home/tambahcategory')->with('success', 'Anda telah berhasil mengupdate Kategori!');
    }
    public function destroy($id)
    {
        $category = Category::find($id);

        if ($category) {
            // Check if there are any referencing rows in the products table
            $products = Product::where('category_id', $id)->get();
            if ($products->count() > 0) {
                // Display an error message and redirect back to the category index page
                return redirect('/home/tambahcategory')->with('error', 'Oops!, Kategory memiliki produk, Hapus produk terlebih dahulu!');
            }

            // Delete the category
            $category->delete();
        }

        return redirect('/home/tambahcategory');
    }
}
