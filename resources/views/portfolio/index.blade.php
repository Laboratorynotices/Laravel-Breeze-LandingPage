<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Portfolio') }}
		</h2>
	</x-slot>

	<div class="container bg-white shadow rounded m-6">
		<div class="row">
			<div class="col p-3">
				<a href="{{ route('portfolio.create') }}">
					<i class="ti-support display-4 d-block text-primary mb-2"></i>
				</a>
				<table class="table table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">{{ __('Image') }}</th>
							<th scope="col">{{ __('Filter') }}</th>
							<th scope="col">{{ __('Action') }}</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($portfolios as $portfolio)
						<tr>
							<td>
								<a href="{{ route('portfolio.edit', array('portfolio' => $portfolio->id)) }}">
									{{ $portfolio->id }}
								</a>
							</td>
							<td>
								<a href="{{ route('portfolio.edit', array('portfolio' => $portfolio->id)) }}">
									<img src="{{ asset('img/portfolio/' . $portfolio->image) }}" alt="" class="w-25">
								</a>
							</td>
							<td>
								<a href="{{ route('portfolio.edit', array('portfolio' => $portfolio->id)) }}">
									{{ $portfolio->filter->full_name }}
								</a>
							</td>
							<td>
								<a href="{{ route('portfolio.destroy', array('portfolio' => $portfolio->id)) }}">
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