@extends('backend.master')
@section('title')
    Add Category | Shopper
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category/</span> Add Category</h4>
                <div class="row">
                  <div class="col-xxl">
                    <div class="card mb-4">
                      <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 text text-success">{{Session::get('msg')}}</h5>
                      </div>
                      <div class="card-body">
                        <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                            <div class="col-sm-10">
                              <input type="text" name="category_name" class="form-control" placeholder="" />
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Category Description</label>
                            <div class="col-sm-10">
                              <textarea type="text" name="category_desc" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                              <input type="file" name="category_image" class="form-control" placeholder="" />
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Pulication Status</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="publication_status" checked value="1" class="mx-2">Published</label>
                                <label><input type="radio" name="publication_status" value="0" class="mx-2">Unpublished</label>
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


