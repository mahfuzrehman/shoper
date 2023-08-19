@extends('frontend.master')
@section('title')
    Cart Details | Shoper
@endsection
@section('content')
 <!-- BREADCRUMB -->
 <div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Cart</h3>
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li class="active">Cart</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->
<div class="container mx-auto">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
				  <div class="table-responsive text-wrap">
						<table class="table table-bordered  py-5">
						<thead>
							<tr>
							<th>Sl</th>
							<th>Product</th>
							<th>Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
							<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@php($sum = 0)
							@foreach ($cartproducts as $cartproduct)
							<tr>
							<td>{{$loop->iteration}}</td>
							<td><img src="{{asset($cartproduct->attributes->image)}}" alt="" style="height: 50px; width:50px"></td>
							<td>{{$cartproduct->name}}</td>
							<td>{{$cartproduct->price}}</td>
							<td>
								<form action="{{route('update-cart')}}" method="POST">
									@csrf
									<input type="number" name="quantity" value="{{$cartproduct->quantity}}" min="1">
									<input type="hidden" name="rowId" value="{{$cartproduct->rowId}}">
									<input type="submit" name="btn" value="Update">
								</form>
							</td>
							<td>{{$total = $cartproduct->quantity*$cartproduct->price}}</td>
							{{-- <td>$ {{Cart::get($cartproduct->id)->getPriceSum()}}</td> --}}
							<td>
								<a href="{{route('cart.delete', $cartproduct->id)}}" class="btn btn-danger me-1" onclick="return confirm('Are you sure to delete?')">
									<i class="fa fa-trash mx-1"></i>
								</a>
							</td>
							{{-- <td>
								@if ($unit->unit_status ==1)
								
								<a href="{{route('unit.destroy', $unit->id)}}" class="badge bg-label-danger me-1" onclick="return confirm('Are you sure to delete?')">
								<i class="bx bx-trash mx-1"></i>
								</a>
							</td> --}}
							</tr>
							@php($sum = $sum + $total)
							@endforeach
							<table class="table table-bordered">
								<tr>
									<th>Sub Total</th>
									<td>Tk. {{$sum}}</td>
								</tr>
								<tr>
									<th>Discount</th>
									<td>Tk. {{$discount = 4}}</td>
								</tr>
								<tr>
									<th>Tax</th>
									<td>Tk. {{$tax = 2}}</td>
								</tr>
								<tr>
									<th>Grand Total</th>
									<td>Tk. {{$grandTotal = ($sum - $discount) + $tax}}</td>
								</tr>
							</table>
							<table class="table table-bordered">
								<tr>
									<td>
										<a href="" class="btn btn-primary">Continue Shopping</a>
									</td>
									<td>
										<a href="{{route('checkout.info')}}" class="btn btn-primary">Checkout</a>
									</td>
								</tr>
							</table>
						</tbody>
						</table>
					  </div>
				</div>
			</div>
			  <!--/ Bordered Table -->
		</div>
	</div>
 
</div>
@endsection