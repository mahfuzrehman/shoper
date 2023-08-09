@extends('backend.master')
@section('title')
    Edit Sub-Category | Shopper
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sub-Category/</span> Edit Sub-category</h4>
                <div class="row">
                  <div class="col-xxl">
                    <div class="card mb-4">
                      <div class="card-header d-flex align-items-center justify-content-between">
                        @if(Session::has('msg'))
                          <h5 class="card-header text text-success">{{Session::get('msg')}}</h5>
                        @endif
                      </div>
                      <div class="card-body">
                        <form action="{{route('subcategories.update', $subcategory->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="category_id">
                                <option>--Select Category--</option>
                                @foreach ($categories as $category)
                                  <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category Name</label>
                            <div class="col-sm-10">
                              <input type="text" name="subcat_name" class="form-control" value="{{$subcategory->subcat_name}}" />
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category Description</label>
                            <div class="col-sm-10">
                              <textarea type="text" name="subcat_desc" class="form-control" cols="30" rows="5">{{$subcategory->subcat_desc}}</textarea>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                              <input type="file" name="subcat_image" class="form-control" value="{{$subcategory->subcat_image}} placeholder="" />
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Pulication Status</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="subcat_status" {{$subcategory->subcat_status == 1 ? 'checked' : ''}} class="mx-2">Published</label>
                                <label><input type="radio" name="subcat_status" {{$subcategory->subcat_status == 0 ? 'checked' : ''}} class="mx-2">Unpublished</label>
                            </div>
                          </div>
                          <div class="row justify-content-end">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-success">Save</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection


