@extends('backend.master')
@section('title')
    All Units | Shopper
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Units /</span> All Units</h4>
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
                  <th style="width: 15%">Unit Name</th>
                  <th style="width: 40%">Unit Description</th>
                  <th>Status</th>
                  <th style="width: 25%">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($units as $unit)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$unit->unit_name}}</td>
                  <td>{{$unit->unit_desc}}</td>
                  <td class="badge bg-label-success mx-2 mt-4">{{$unit->unit_status ==1 ? 'Active' : 'Inactive'}}</td>
                  <td>
                    @if ($unit->unit_status ==1)
                      <a href="{{route('unpublished.unit',$unit->id)}}" class="badge bg-label-success me-1"><i class='bx bx-like'></i></a>
                    @else
                      <a href="{{route('published.unit',$unit->id)}}" class="badge bg-label-warning me-1"><i class='bx bx-dislike'></i></a>
                    @endif
                    <a href="{{route('unit.edit', $unit->id)}}" class="badge bg-label-primary me-1"><i class="bx bx-edit-alt mx-1"></i></a>
                    <a href="{{route('unit.destroy', $unit->id)}}" class="badge bg-label-danger me-1" onclick="return confirm('Are you sure to delete?')">
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
