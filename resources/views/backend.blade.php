
<!doctype html>

<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Styles -->
	<link href=" {{ asset('css//backend/fontawesome.css') }}" rel="stylesheet">
	<link href="{{ asset('css/backend/bulma.css') }}" rel="stylesheet">

	<!-- Animate.css to handle animation -->
	<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
</head>

<body>
	<div id="admin">
	<backend> </backend>
	</div>
	<script src="{{ mix('js/app-backend.js') }}"></script>
</body>

</html>
