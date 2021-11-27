<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Portfolio Filters') }}
		</h2>
	</x-slot>

	<div class="container bg-white shadow rounded m-6">
		<div class="row">
			<div class="col p-3">
				<a href="{{ route('portfolio.filter.create') }}">
					<i class="ti-support display-4 d-block text-primary mb-2"></i>
				</a>
				<table class="table table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">{{ __('Name') }}</th>
							<th scope="col">{{ __('Action') }}</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($portfolioFilters as $portfolioFilter)
						<tr>
							<td>
								<a href="{{ route('portfolio.filter.edit', array('portfolioFilter' => $portfolioFilter->id)) }}">
									{{ $portfolioFilter->id }}
								</a>
							</td>
							<td>
								<a href="{{ route('portfolio.filter.edit', array('portfolioFilter' => $portfolioFilter->id)) }}">
									{{ $portfolioFilter->full_name }}
								</a>
							</td>
							<td>
								<a href="{{ route('portfolio.filter.destroy', array('portfolioFilter' => $portfolioFilter->id)) }}">
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