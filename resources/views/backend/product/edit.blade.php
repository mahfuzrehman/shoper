@extends('backend.master')
@section('title')
    Edit Product | Shopper
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product/</span> Edit Product</h4>
                <div class="row">
                  <div class="col-xxl">
                    <div class="card mb-4">
                      <div class="card-header d-flex align-items-center justify-content-between">
                        @if(Session::has('msg'))
                          <h5 class="card-header text text-success">{{Session::get('msg')}}</h5>
                        @endif
                      </div>
                      <div class="card-body">
                        <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
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
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Sub-category Name</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="subcat_id">
                                <option>--Select Sub-category--</option>
                                @foreach ($subcategories as $subcategory)
                                  <option value="{{$subcategory->id}}">{{$subcategory->subcat_name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Brand Name</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="brand_id">
                                <option>--Select Brands--</option>
                                @foreach ($brands as $brand)
                                  <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Unit</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="unit_id">
                                <option>--Select Unit--</option>
                                @foreach ($units as $unit)
                                  <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                            <div class="col-sm-10">
                              <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}" placeholder="" />
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Regular Price</label>
                            <div class="col-sm-10">
                              <input type="number" name="regular_price" class="form-control" value="{{$product->regular_price}}" placeholder="" />
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Selling Price</label>
                            <div class="col-sm-10">
                              <input type="number" name="selling_price" class="form-control" value="{{$product->selling_price}}" placeholder="" />
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Quantity</label>
                            <div class="col-sm-10">
                              <input type="number" name="product_quantity" class="form-control" value="{{$product->product_quantity}}" placeholder="" />
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Long Description</label>
                            <div class="col-sm-10">
                              <textarea type="text" name="product_long_desc" value="{{$product->product_long_desc}}" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Short Description</label>
                            <div class="col-sm-10">
                              <textarea type="text" name="product_short_desc" value="{{$product->product_short_desc}}" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                              <input type="file" name="product_image" class="form-control" value="{{$product->product_image}}" placeholder="" />
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Pulication Status</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="product_status" {{$product->product_status == 1 ? 'checked' : ''}} class="mx-2">Published</label>
                                <label><input type="radio" name="product_status" {{$product->product_status == 0 ? 'checked' : ''}} class="mx-2">Unpublished</label>
                            </div>
                          </div>
                          <div class="row justify-content-end">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-success">update Product</button>
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


