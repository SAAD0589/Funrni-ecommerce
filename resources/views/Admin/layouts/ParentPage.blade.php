<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{asset('assets\css\styleAdmin.css')}}">
	<title>AdminHub</title>
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>

    @include('Admin.layouts.NavBar')
    @yield('content')

	<script src="{{asset('assets\js\scriptAdmin.js')}}"></script>

</body>
</html>