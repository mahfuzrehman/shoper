<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function create() {
        return view('backend.brand.add');
    }
    public function store(Request $request) {
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_status = $request->brand_status;
        $brand->save();
        return back()->with('msg','Brand Added Successfuly!');
    }
    public function index() {
        $brands = Brand::all();
        return view('backend.brand.manage', compact('brands'));
    }
    public function edit($id) {
        $brand = Brand::find($id);
        return view('backend.brand.edit', compact('brand'));
    }
    public function update(Request $request, $id) {
        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_status = $request->brand_status;
        $brand->save();
        return redirect()->back()->with('msg','Brand Updated Successfully!');
    }
    public function destroy($id) {
        $brand = Brand::find($id);
        $brand->delete();
        return back()->with('msg','Brand Deleted Successfully.');
    }
    public function unpublishedBrand($id) {
        $brand = Brand::find($id);
        $brand->brand_status = 0;
        $brand->save();
        return back()->with('msg','Brand Deactivated Successfully.');
    }
    public function publishedBrand($id) {
        $brand = Brand::find($id);
        $brand->brand_status = 1;
        $brand->save();
        return back()->with('msg','Brand Activated Successfully.');
    }

}
