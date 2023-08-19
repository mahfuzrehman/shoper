@extends('frontend.master')
@section('title')
    Login - Registration
@endsection
@section('content')
 <!-- BREADCRUMB -->
 <div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Home</h3>
				<ul class="breadcrumb-tree">
					<li><a href="#">Cart</a></li>
					<li class="active">User info</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="text-center">Register</h1>
            <form action="{{route('new.customer')}}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="first_name">
                    <span style="color: red">{{$errors->has('first_name') ? $errors->first('first_name') : ' '}}</span>
                </div>
                <div class="form-group mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control">
                    <span style="color: red">{{$errors->has('last_name') ? $errors->first('last_name') : ' '}}</span>
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                    <span style="color: red">{{$errors->has('email') ? $errors->first('email') : ' '}}</span>
                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <span style="color: red">{{$errors->has('password') ? $errors->first('password') : ' '}}</span>
                </div>
                <div class="form-group mb-3">
                    <label>Phone Number</label>
                    <input type="number" name="phone" class="form-control">
                    <span style="color: red">{{$errors->has('phone') ? $errors->first('phone') : ' '}}</span>
                </div>
                <div class="form-group mb-3">
                    <label>Address</label>
                    <textarea type="text" name="address" type="text" cols="30" rows="10" class="form-control"></textarea>
                    <span style="color: red">{{$errors->has('address') ? $errors->first('address') : ' '}}</span>
                </div>
                <div class="form-group mb-3">
                    <input type="submit" value="Register" class="btn btn-success">
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h1 class="text-center">Login</h1>
            <form action="" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                    <span style="color: red">{{$errors->has('email') ? $errors->first('email') : ' '}}</span>
                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control">
                    <span style="color: red">{{$errors->has('password') ? $errors->first('password') : ' '}}</span>
                </div>
                <div class="form-group mb-3">
                    <input type="submit" value="Login" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>


{{-- <div class="login-register-area pb-100 pt-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 offset-lg-2">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a data-bs-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">
                                        <input type="text" name="user-name" placeholder="Username">
                                        <input type="password" name="user-password" placeholder="Password">
                                        <div class="login-toggle-btn">
                                            <input type="checkbox">
                                            <label>Remember me</label>
                                            <a href="#">Forgot Password?</a>
                                        </div>
                                        <div class="button-box btn-hover">
                                            <button type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">
                                        <input type="text" name="user-name" placeholder="Username">
                                        <input type="password" name="user-password" placeholder="Password">
                                        <input name="user-email" placeholder="Email" type="email">
                                        <div class="button-box btn-hover">
                                            <button type="submit">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection