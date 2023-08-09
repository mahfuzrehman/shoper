@extends('backend.master')
@section('title')
    All Products | Shopper
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products /</span> All Products</h4>
    <div class="card">
      @if(Session::has('msg'))
        <h5 class="card-header text text-success">{{Session::get('msg')}}</h5>
      @endif
        <div class="card-body">
          <div class="table-responsive text-wrap">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th scope="col" style="width: 5%">Category Name</th>
                  {{-- <th scope="col" style="width: 5%">Sub-category Name</th> --}}
                  <th scope="col" style="width: 5%">Brand Name</th>
                  <th scope="col" style="width: 5%">Unit</th>
                  <th scope="col" style="width: 10%">Product Name</th>
                  <th scope="col" style="width: 5%">Price</th>
                  <th scope="col" style="width: 5%">Selling Price</th>
                  <th scope="col" style="width: 5%">Quantity</th>
                  <th scope="col">Long Description</th>
                  <th scope="col">Short Description</th>
                  <th scope="col">Image</th>
                  <th>Status</th>
                  <th style="width: 30%">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$product->category->category_name}}</td>
                  {{-- <td>{{$product->subcategory->subcat_name}}</td> --}}
                  <td>{{$product->brand->brand_name}}</td>
                  <td>{{$product->unit->unit_name}}</td>
                  <td>{{$product->product_name}}</td>
                  <td>{{$product->regular_price}}</td>
                  <td>{{$product->selling_price}}</td>
                  <td>{{$product->product_quantity}}</td>
                  <td>{{$product->product_long_desc}}</td>
                  <td>{{$product->product_short_desc}}</td>
                  <td><img src="{{isset($product->product_image) ? asset($product->product_image) : '' }}" alt="" style="height: 50px; width:50px"></td>
                  <td class="badge bg-label-success mx-2 mt-4">{{$product->product_status ==1 ? 'Active' : 'Inactive'}}</td>
                  <td>
                    @if ($product->product_status ==1)
                        <a href="{{route('unpublished.product',$product->id)}}" class="badge bg-label-success me-1"><i class='bx bx-like'></i></a>
                      @else
                        <a href="{{route('published.product',$product->id)}}" class="badge bg-label-warning me-1"><i class='bx bx-dislike'></i></a>
                      @endif
                    <a href="{{route('product.edit', $product->id)}}" class="badge bg-label-primary me-1"><i class="bx bx-edit-alt mx-1"></i></a>
                    <a href="{{route('product.destroy', $product->id)}}" class="badge bg-label-danger me-1" onclick="return confirm('Are you sure to delete?')">
                      <i class="bx bx-trash mx-1"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
      <!--/ Bordered Table -->
</div>
@endsection
