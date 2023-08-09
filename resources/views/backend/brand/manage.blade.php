@extends('backend.master')
@section('title')
    All Brands | Shopper
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Brands /</span> All Brands</h4>
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
                  <th style="width: 15%">Brand Name</th>
                  <th style="width: 40%">Brand Description</th>
                  <th>Status</th>
                  <th style="width: 25%">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($brands as $brand)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$brand->brand_name}}</td>
                    <td>{{$brand->brand_desc}}</td>
                    <td class="badge bg-label-success mx-2 mt-4">{{$brand->brand_status ==1 ? 'Active' : 'Inactive'}}</td>
                    <td>
                      @if ($brand->brand_status ==1)
                        <a href="{{route('unpublished.brand',$brand->id)}}" class="badge bg-label-success me-1"><i class='bx bx-like'></i></a>
                      @else
                        <a href="{{route('published.brand',$brand->id)}}" class="badge bg-label-warning me-1"><i class='bx bx-dislike'></i></a>
                      @endif
                      
                      <a href="{{route('brand.edit', $brand->id)}}" class="badge bg-label-primary me-1"><i class="bx bx-edit-alt mx-1"></i></a>
                      <a href="{{route('brand.destroy', $brand->id)}}" class="badge bg-label-danger me-1" onclick="return confirm('Are you sure to delete?')">
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
