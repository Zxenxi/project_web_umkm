<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $products = Product::join('customers', 'products.customer_id', '=', 'customers.id')
            ->select('products.*', 'customers.phone_number')
            ->with('category')
            ->get();
        // $products = Product::with('category')->get();

        return view('user.user_dashboard', compact('category', 'products'));
    }   

    public function mainCategory()
    {
        $category = Category::all();
        $products = Product::join('customers', 'products.customer_id', '=', 'customers.id')
            ->select('products.*', 'customers.phone_number')
            ->with('category')
            ->get();

        return view('user.user_mainproduct', compact('category', 'products'));
    }
    //menampilkan product berdasarkan kategori
    public function showByCategory($id)
    {
        // Retrieve the category based on the id
        $categories = Category::all();
        $category = Category::find($id);

        // Retrieve all products that belong to the category
        $products = Product::join('customers', 'products.customer_id', '=', 'customers.id')
            ->where('products.category_id', $category->id)
            ->select('products.*', 'customers.phone_number')
            ->with('category')
            ->get();

        // Pass the products and category to the view
        return view('user.user_product', compact('products', 'category', 'categories'));
    }

    public function search(Request $request)
    {
        // kalu mau extend category nav harus menambahkan seperti dibawah ini ya guys ya
        $category = Category::all();

        $keyword = $request->search;
        $products = Product::where('name', 'like', "%" . $keyword . "%")
            ->orWhere('description', 'like', "%" . $keyword . "%")
            ->paginate(5);
        return view('user.user_mainproduct', compact('products', 'category'));
    }
    // public function details($id)
    // {
    //     $category = Category::all();
        
    //     $product = Product::findOrFail($id);
    //     return view('user.user_detailsProduct', compact('product', 'category'));
    // }
    public function details($id)
{
    $category = Category::all();

    // Retrieve the product based on its ID
    $product = Product::findOrFail($id);

    // Retrieve the associated customer (assuming there is a 'customer' relationship defined in the Product model)
    $customer = $product->customer;

    // Access the phone number from the customer
    $phone_number = $customer->phone_number;

    return view('user.user_detailsProduct', compact('product', 'phone_number', 'category'));
}

}
