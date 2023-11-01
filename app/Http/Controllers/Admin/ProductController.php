<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function create()
    {
        $customer = Customer::all();
        $category = Category::all();
        $products = Product::with('category', 'customer')->get();
        return view('home.product.tambah_product', compact('category', 'products', 'customer'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'customer_id' => 'required|exists:customers,id',
            // 'image' => 'nullable|image|max:7048', // max size of 2 MB
        ], [
            'name' => 'Nama produk tidak boleh kosong!',
            'price' => 'Harga produk tidak boleh kosong!',
            'category_id' => 'Kategori produk tidak boleh kosong!',
            'customer_id' => 'Nama Customer produk tidak boleh kosong!',
        ]);

        $product = new Product;
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->description = $request->input('description');
        $product->category_id = $validatedData['category_id'];
        $product->customer_id = $validatedData['customer_id'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images/products');
            $product->image = $imagePath;
        }
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->image->store('public/images/products');
        //     $product->image = $imagePath;
        // }

        $product->save();

        return redirect('/home/tambahproducts')->with('success', 'anda telah berhasil menambahkan produk!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $customer = Customer::all();
        $categories = Category::all();
        return view('home.product.edit_product', compact('product', 'categories', 'customer'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'customer_id' => 'required',
            'image' => 'nullable|image|max:7048', // max size of 2 MB
        ], [
            'name' => 'Nama produk tidak boleh kosong!',
            'price' => 'Harga produk tidak boleh kosong!',
            'category_id' => 'Kategori produk tidak boleh kosong!',
            'customer_id' => 'Nama Customer produk tidak boleh kosong!',
        ]); 

        $product = Product::find($id);
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->description = $request->input('description');
        $product->category_id = $validatedData['category_id'];
        $product->customer_id = $validatedData['customer_id'];

        if ($request->hasFile('image')) {
            $imagePath = $request->image->store('public/images/products');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect('/home/tambahproducts')->with('success', 'Anda berhasil mengupdate Produk!.');
    }


    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();

        return redirect('/home/tambahproducts')->with('success', 'Anda berhasil menghapus Produk!.');
    }
}