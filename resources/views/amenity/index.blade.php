<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Amenities') }}
		</h2>
	</x-slot>

	<div class="container bg-white shadow rounded m-6">
		<div class="row">
			<div class="col p-3">
				<a href="#">
					<i class="ti-support display-4 d-block text-primary mb-2"></i>
				</a>
				<table class="table table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">{{ __('Icon') }}</th>
							<th scope="col">{{ __('Title') }}</th>
							<th scope="col">{{ __('Action') }}</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($amenities as $amenity)
						<tr>
							<td>
								<a href="{{ route('amenity.edit', array('amenity' => $amenity->id)) }}">
									{{ $amenity->id }}
								</a>
							</td>
							<td>
								<a href="{{ route('amenity.edit', array('amenity' => $amenity->id)) }}">
									<i class="{{ $amenity->icon }} d-block text-primary"></i>
								</a>
							</td>
							<td>
								<a href="{{ route('amenity.edit', array('amenity' => $amenity->id)) }}">
									{{ $amenity->title }}
								</a>
							</td>
							<td>
								<i class="ti-trash d-block text-primary"></i>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

</x-app-layout>