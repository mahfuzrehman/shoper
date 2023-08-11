<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $categories = Category::where('publication_status',1)->get();
        $products = Product::where('product_status',1)->latest()->limit(12)->get();
        return view('frontend.home.home',compact('products','categories'));
    }
    public function viewProductDetails($id) {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $product = Product::find($id);
        $relatedproducts = Product::where('category_id', $category_id = $product->category_id)->limit(4)->get();
        return view('frontend.pages.view-details',compact('product','categories','subcategories','brands','units','relatedproducts'));
    }
    public function categoryProducts($id) {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $products = Product::where('product_status', 1)->where('category_id', $id)->limit(12)->get();
        return view('frontend.pages.category-products',compact('products','categories','subcategories','brands','units'));
    }
}
