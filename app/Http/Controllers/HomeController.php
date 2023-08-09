<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $categories = Category::where('publication_status',1)->latest()->limit(3)->get();
        $products = Product::where('product_status',1)->latest()->limit(12)->get();
        return view('frontend.home.home',compact('products','categories'));
    }
}
