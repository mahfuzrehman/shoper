<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function create() {
        $categories = Category::where('publication_status',1)->get();
        return view('backend.subcategory.add', compact('categories'));
    }
    public function index() {
        $subcategories = Subcategory::all();
        return view('backend.subcategory.manage', compact('subcategories'));
    }
    public function store(Request $request) {
        $getImg = $request->file('subcat_image');
        $imgExt = $getImg->getClientOriginalExtension();
        $imgName = time().'.'.$imgExt;
        $imgFolder = 'product-image/';
        $getImg->move($imgFolder,$imgName);

        $subcategory = new Subcategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcat_name = $request->subcat_name;
        $subcategory->subcat_desc = $request->subcat_desc;
        $subcategory->subcat_image = $imgFolder.$imgName;
        $subcategory->subcat_status = $request->subcat_status;
        $subcategory->save();
        return back()->with('msg','Sub-category Added Successfully!');
    }
    public function edit($id) {
        $categories = Category::where('publication_status',1)->get();
        $subcategory = Subcategory::find($id);
        return view('backend.subcategory.edit', compact('categories','subcategory'));
    }
    public function update(Request $request, $id) {
        $getImg = $request->file('subcat_image');
        $imgExt = $getImg->getClientOriginalExtension();
        $imgName = time().'.'.$imgExt;
        $imgFolder = 'product-image/';
        $getImg->move($imgFolder,$imgName);

        $subcategory = Subcategory::find($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->subcat_name = $request->subcat_name;
        $subcategory->subcat_desc = $request->subcat_desc;
        $subcategory->subcat_image = $imgFolder.$imgName;
        $subcategory->subcat_status = $request->subcat_status;
        $subcategory->save();
        return redirect()->back()->with('msg','Sub-category Updated Successfully!');
    }

    public function destroy($id) {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return back()->with('msg','Sub-category Deleted Successfully.');
    }
    public function unpublishedSubcategory($id) {
        $subcategory = Subcategory::find($id);
        $subcategory->subcat_status = 0;
        $subcategory->save();
        return back()->with('msg','Sub-category Deactived Successfully.');
    }
    public function publishedSubcategory($id) {
        $subcategory = Subcategory::find($id);
        $subcategory->subcat_status = 1;
        $subcategory->save();
        return back()->with('msg','Sub-category Activated Successfully.');
    }
}
