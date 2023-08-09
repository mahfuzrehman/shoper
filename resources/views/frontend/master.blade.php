<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>@yield('title')</title>

		@include('frontend.common.css')
        @include('frontend.common.header')

    </head>
	<body>
		@yield('content')
		<!-- FOOTER -->
		@include('frontend.common.footer')
		<!-- /FOOTER -->
@include('frontend.common.js')