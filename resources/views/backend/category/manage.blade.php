@extends('backend.master')
@section('title')
    All Category | Shopper
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category /</span> All Category</h4>
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
                  <th style="width: 15%">Category Name</th>
                  <th style="width: 40%">Category Description</th>
                  <th style="width: 20%">Category Image</th>
                  <th>Status</th>
                  <th style="width: 25%">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category->category_desc}}</td>
                    <td><img src="{{isset($category->category_image) ? asset($category->category_image) : '' }}" alt="" style="height: 50px; width:50px"></td>
                    <td class="badge bg-label-success mx-2 mt-4">{{$category->publication_status ==1 ? 'Active' : 'Inactive'}}</td>
                    <td>
                      @if ($category->publication_status ==1)
                        <a href="{{route('unpublished.category',$category->id)}}" class="badge bg-label-success me-1"><i class='bx bx-like'></i></a>
                      @else
                        <a href="{{route('published.category',$category->id)}}" class="badge bg-label-warning me-1"><i class='bx bx-dislike'></i></a>
                      @endif
                      
                      <a href="{{route('categories.edit', $category->id)}}" class="badge bg-label-primary me-1"><i class="bx bx-edit-alt mx-1"></i></a>
                      <a href="{{route('categories.destroy', $category->id)}}" class="badge bg-label-danger me-1" onclick="return confirm('Are you sure to delete?')">
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
