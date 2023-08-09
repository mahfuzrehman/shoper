<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create() {
        $categories = Category::where('publication_status',1)->get();
        $subcategories = Subcategory::where('subcat_status',1)->get();
        $brands = Brand::where('brand_status',1)->get();
        $units = Unit::where('unit_status',1)->get();
        return view('backend.product.add', compact('categories','subcategories','brands','units'));
    }
    public function store(Request $request){
        $getImg = $request->file('product_image');
        $imgExt = $getImg->getClientOriginalExtension();
        $imgName = time().'.'.$imgExt;
        $imgFolder = 'product-images/';
        $getImg->move($imgFolder,$imgName);
        
        $products = new Product();
        $products->category_id = $request->category_id;
        $products->subcat_id = $request->subcat_id;
        $products->brand_id = $request->brand_id;
        $products->unit_id = $request->unit_id;
        $products->product_name = $request->product_name;
        $products->regular_price = $request->regular_price;
        $products->selling_price = $request->selling_price;
        $products->product_quantity = $request->product_quantity;
        $products->product_short_desc = $request->product_short_desc;
        $products->product_long_desc = $request->product_long_desc;
        $products->product_image = $imgFolder.$imgName;
        $products->product_status = $request->product_status;
        $products->save();
        return back()->with('msg','Product Added Successfuly!');
    }
    public function index() {
        $products = Product::all();
        return view('backend.product.manage', compact('products'));
    }
    public function update(Request $request, $id){
        $getImg = $request->file('product_image');
        $imgExt = $getImg->getClientOriginalExtension();
        $imgName = time().'.'.$imgExt;
        $imgFolder = 'product-images/';
        $getImg->move($imgFolder,$imgName);
        
        $products = new Product();
        $products->category_id = $request->category_id;
        $products->subcat_id = $request->subcat_id;
        $products->brand_id = $request->brand_id;
        $products->unit_id = $request->unit_id;
        $products->product_name = $request->product_name;
        $products->regular_price = $request->regular_price;
        $products->selling_price = $request->selling_price;
        $products->product_quantity = $request->product_quantity;
        $products->product_short_desc = $request->product_short_desc;
        $products->product_long_desc = $request->product_long_desc;
        $products->product_image = $imgFolder.$imgName;
        $products->product_status = $request->product_status;
        $products->save();
        return back()->with('msg','Product Updated Successfuly!');
    }
    public function edit($id) {
        $categories = Category::where('publication_status',1)->get();
        $subcategories = Subcategory::where('subcat_status',1)->get();
        $brands = Brand::where('brand_status',1)->get();
        $units = Unit::where('unit_status',1)->get();
        $product = Product::find($id);
        return view('backend.product.edit', compact('product', 'categories', 'brands','units', 'subcategories'));
    }
    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return back()->with('msg','Product Deleted Successfully.');
    }
    public function unpublishedProduct($id) {
        $product = Product::find($id);
        $product->product_status = 0;
        $product->save();
        return back()->with('msg','Product Deactivated Successfully.');
    }
    public function publishedProduct($id) {
        $product = Product::find($id);
        $product->product_status = 1;
        $product->save();
        return back()->with('msg','Product Activated Successfully.');
    }
}
