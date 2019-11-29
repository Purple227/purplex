
<!doctype html>

<html lang="{{ app()->getLocale() }}">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Styles -->
		<link href=" {{ asset('css//frontend/fontawesome.css') }}" rel="stylesheet">
		<link href="{{ asset('css/frontend/bulma.css') }}" rel="stylesheet">

		<!-- Animate.css to handle animation -->
		<link href="{{ asset('css/animate.css') }}" rel="stylesheet">

	</head>

		<body>

			<frontend id="user"> </frontend>

		</body>

<script src="{{ mix('js/app-frontend.js') }}"></script>

</html>
