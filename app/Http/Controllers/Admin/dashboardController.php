<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $customer = Customer::all();
        $products = Product::with('category', 'customer')->get();

        return view('home.index', compact('products', 'categories', 'customer'));
    }
    public function data()
    {
        $products = Product::all();

        // Retrieve data from category model
        $categories = Category::all();

        // Transform data into the format suitable for the chart
        $chartData = [];

        foreach ($categories as $category) {
            $categoryProducts = $category->products;
            $productCount = count($categoryProducts);
            $chartData[] = [
                'category' => $category->name,
                'product_count' => $productCount
            ];
        }
    }
}
