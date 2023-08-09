@extends('backend.master')
@section('title')
    All Category | Shopper
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category /</span> All Category</h4>
    <div class="card">
        <h5 class="card-header text text-success">Category Chaneged Successfully</h5>
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
                <tr>
                  <td>01</td>
                  <td>Beauty</td>
                  <td>This is a best goods in Bd. We recommend you to purchase this at a cheap rate.</td>
                  <td><img src="{{asset('/')}}backend-assets/assets/img/avatars/5.png" alt="" style="height: 50px; width:50px"></td>
                  <td class="badge bg-label-success mx-2 mt-4">Active</td>
                  <td>
                    <a href="#" class="badge bg-label-success me-1"><i class="fa-regular fa-thumbs-up"></i></a>
                    <a href="#" class="badge bg-label-primary me-1"><i class="bx bx-edit-alt mx-1"></i></a>
                    <a href="#" class="badge bg-label-danger me-1"><i class="bx bx-trash mx-1"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>02</td>
                  <td>Beauty</td>
                  <td>This is a best goods in Bd. We recommend you to purchase this at a cheap rate.</td>
                  <td><img src="{{asset('/')}}backend-assets/assets/img/avatars/5.png" alt="" style="height: 50px; width:50px"></td>
                  <td class="badge bg-label-success mx-2 mt-4">Active</td>
                  <td>
                    <a href="#" class="badge bg-label-success me-1"><i class="fa-regular fa-thumbs-up"></i></a>
                    <a href="#" class="badge bg-label-primary me-1"><i class="bx bx-edit-alt mx-1"></i></a>
                    <a href="#" class="badge bg-label-danger me-1"><i class="bx bx-trash mx-1"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>03</td>
                  <td>Beauty</td>
                  <td>This is a best goods in Bd. We recommend you to purchase this at a cheap rate.</td>
                  <td><img src="{{asset('/')}}backend-assets/assets/img/avatars/5.png" alt="" style="height: 50px; width:50px"></td>
                  <td class="badge bg-label-success mx-2 mt-4">Active</td>
                  <td>
                    <a href="#" class="badge bg-label-success me-1"><i class="fa-regular fa-thumbs-up"></i></a>
                    <a href="#" class="badge bg-label-primary me-1"><i class="bx bx-edit-alt mx-1"></i></a>
                    <a href="#" class="badge bg-label-danger me-1"><i class="bx bx-trash mx-1"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>04</td>
                  <td>Beauty</td>
                  <td>This is a best goods in Bd. We recommend you to purchase this at a cheap rate.</td>
                  <td><img src="{{asset('/')}}backend-assets/assets/img/avatars/5.png" alt="" style="height: 50px; width:50px"></td>
                  <td class="badge bg-label-warning mx-2 mt-4">Inactive</td>
                  <td>
                    <a href="#" class="badge bg-label-success me-1"><i class="fa-regular fa-thumbs-up"></i></a>
                    <a href="#" class="badge bg-label-primary me-1"><i class="bx bx-edit-alt mx-1"></i></a>
                    <a href="#" class="badge bg-label-danger me-1"><i class="bx bx-trash mx-1"></i></a>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
    </div>
      <!--/ Bordered Table -->
</div>
@endsection
