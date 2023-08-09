<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Add Category page
    public function create(){
        return view('backend.category.add');
    }
    
    //Store Category Data
    public function store(Request $request){

        $getImg = $request->file('category_image');
        $imgExt = $getImg->getClientOriginalExtension();
        $imgName = time().'.'.$imgExt;
        $imgFolder = 'product-image/';
        $getImg->move($imgFolder,$imgName);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        $category->category_image = $imgFolder.$imgName;
        $category->publication_status = $request->publication_status;
        $category->save();
        return back()->with('msg','Category Added Successfully');
    }
    //Show Category Data
    public function index() {
        $categories = Category::all();
        return view('backend.category.manage', ['categories'=>$categories]);
    }
    //Edit Category
    public function edit($id) {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    // Update Category
    public function update(Request $request, $id) {
        $getImg = $request->file('category_image');
        $imgExt = $getImg->getClientOriginalExtension();
        $imgName = time().'.'.$imgExt;
        $imgFolder = 'product-image/';
        $getImg->move($imgFolder,$imgName);

        // $getImg = $request->file('category_image');
        // $imgExt = $getImg->getClientOriginalExtension();
        // $imgName = time().'.'.$imgExt;
        // $imgFolder = 'product-image/';
        // $getImg->move($imgFolder,$imgName);
    
        
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        $category->category_image = $imgFolder.$imgName;
        $category->publication_status = $request->publication_status;
        $category->save();
        return redirect()->back()->with('msg','Category Updated Successfully!');
    }
    // Delete category
    public function destroy($id) {
        $category = Category::find($id);
        $category->delete();
        return back()->with('msg','Category Deleted Successfully.');
    }
    // Unpublished Category
    public function UnpublishedCategory($id) {
        $category = Category::find($id);
        $category->publication_status = 0;
        $category->save();
        return back()->with('msg','Category Deactivated Successfully.');
    }
    //Published Category
    public function publishedCategory($id) {
        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();
        return back()->with('msg','Category Activated Successfully.');
    }
}
