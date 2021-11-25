<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Exercises') }}
		</h2>
	</x-slot>

	<div class="container bg-white shadow rounded m-6">
		<div class="row">
			<div class="col p-3">
				<a href="{{ route('exercise.create') }}">
					<i class="ti-support display-4 d-block text-primary mb-2"></i>
				</a>
				<table class="table table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">{{ __('Time') }}</th>
							<th scope="col">{{ __('Class') }}</th>
							<th scope="col">{{ __('Action') }}</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($exercises as $exercise)
						<tr>
							<td>
								<a href="{{ route('exercise.edit', array('exercise' => $exercise->id)) }}">
									{{ $exercise->id }}
								</a>
							</td>
							<td>
								<a href="{{ route('exercise.edit', array('exercise' => $exercise->id)) }}">
									{{ $exercise->time }}
								</a>
							</td>
							<td>
								<a href="{{ route('exercise.edit', array('exercise' => $exercise->id)) }}">
									{{ $exercise->class }}
								</a>
							</td>
							<td>
								<a href="{{ route('exercise.destroy', array('exercise' => $exercise->id)) }}">
									<i class="ti-trash d-block text-primary"></i>
								</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

</x-app-layout>