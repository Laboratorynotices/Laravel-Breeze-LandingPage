<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
@include('layouts.main.head')

<body>
	@include('layouts.main.header')

	<main role="main">

		@include('layouts.main.services')
		@include('layouts.main.about')
		@include('layouts.main.amenities')
		@include('layouts.main.portfolio')
		@include('layouts.main.offer')
		@include('layouts.main.team')
		@include('layouts.main.price')
		@include('layouts.main.numbers')
		@include('layouts.main.testimonials')
		@include('layouts.main.contact')

		<!-- End Clients Section -->
	</main>

	@include('layouts.main.footer')

	@include('layouts.main.jsimport')
</body>
<!-- End Body -->
</html>