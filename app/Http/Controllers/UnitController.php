<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function create() {
        return view('backend.unit.add');
    }
    public function store(Request $request) {
        $unit = new Unit();
        $unit->unit_name = $request->unit_name;
        $unit->unit_desc = $request->unit_desc;
        $unit->unit_status = $request->unit_status;
        $unit->save();
        return back()->with('msg','Unit Added Successfuly!');
    }
    public function index() {
        $units = Unit::all();
        return view('backend.unit.manage', compact('units'));
    }
    public function edit($id) {
        $unit = Unit::find($id);
        return view('backend.unit.edit', compact('unit'));
    }
    public function update(Request $request, $id) {
        $unit = Unit::find($id);
        $unit->unit_name = $request->unit_name;
        $unit->unit_desc = $request->unit_desc;
        $unit->unit_status = $request->unit_status;
        $unit->save();
        return redirect()->back()->with('msg','Unit Updated Successfuly!');
    }
    public function destroy($id) {
        $unit = Unit::find($id);
        $unit->delete();
        return back()->with('msg','Unit Deleted Successfully.');
    }
    public function unpublishedUnit($id) {
        $unit = Unit::find($id);
        $unit->unit_status = 0;
        $unit->save();
        return back()->with('msg','Unit Deactivated Successfully.');
    }
    public function publishedUnit($id) {
        $unit = Unit::find($id);
        $unit->unit_status = 1;
        $unit->save();
        return back()->with('msg','Unit Activated Successfully.');
    }
}
