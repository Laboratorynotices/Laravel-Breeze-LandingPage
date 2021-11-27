<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Dashboard') }}
		</h2>
	</x-slot>

	<div class="container">
		<div class="row m-6 p-3 bg-white shadow rounded">
			<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 my-3 p-3">
				<a href="{{ route('service.index') }}" class="btn btn-light shadow w-100 h-100">
					{{ __('Services') }}
				</a>
			</div>
			<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 my-3 p-3">
				<a href="{{ route('aboutBlock.index') }}" class="btn btn-light shadow w-100 h-100">
					{{ __('About us') }}
				</a>
			</div>
			<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 my-3 p-3">
				<a href="{{ route('amenity.index') }}" class="btn btn-light shadow w-100 h-100">
					{{ __('Amenities') }}
				</a>
			</div>
			<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 my-3 p-3">
				<a href="#" class="btn btn-light shadow">
					use App\Models\Portfolio;
				</a>
			</div>
			<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 my-3 p-3">
				<a href="{{ route('portfolio.filter.index') }}" class="btn btn-light shadow w-100 h-100">
					{{ __('Portfolio Filters') }}
				</a>
			</div>
			<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 my-3 p-3">
				<a href="{{ route('employee.index') }}" class="btn btn-light shadow w-100 h-100">
					{{ __('Employees') }}
				</a>
			</div>
			<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 my-3 p-3">
				<a href="{{ route('exercise.index') }}" class="btn btn-light shadow w-100 h-100">
					{{ __('Exercises') }}
				</a>
			</div>
			<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 my-3 p-3">
				<a href="{{ route('testimonial.index') }}" class="btn btn-light shadow w-100 h-100">
					{{ __('Testimonials') }}
				</a>
			</div>
			<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 my-3 p-3">
				<a href="#" class="btn btn-light shadow w-100 h-100">
					other
				</a>
			</div>
		</div>
	</div>


	<!-- div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					You're logged in!
				</div>
			</div>
		</div>
	</div -->
</x-app-layout>
 
