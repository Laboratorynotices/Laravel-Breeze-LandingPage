<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			@isset($service->id)
			{{ __('Portfolio Edit') }}
			@endisset
			@empty($service)
			{{ __('Portfolio Create') }}
			@endempty
		</h2>
	</x-slot>

	<div class="container bg-white shadow rounded m-6 p-3">
		<div class="row">
			<div class="col">
				
				<div class="form">

					<!-- Form itself -->
					<form
						name="sentMessage"
						class="well"
						id="contactForm"
						novalidate
						data-aos="fade-up"
						data-aos-easing="linear"
						data-aos-delay="200"
						action="{{
							isset($portfolio->id) ?
								route('portfolio.update', array('portfolio' => $portfolio->id)) :
								route('portfolio.store')
						}}"
						method="post"
						enctype="multipart/form-data"
					>
						{{csrf_field()}}
						@isset($portfolio->id)
						<input name="id" type="hidden" value="{{ $portfolio->id }}" />
						@endisset


						<div class="control-group">
							<div class="form-group mb-4">
								@if ($errors->has('image'))
								<div class="alert alert-danger" role="alert">{{ $errors->first('image') }}</div>
								@endif
								@isset($portfolio->image)
								<img src="/img/portfolio/{{ $portfolio->image }}" width="250" />
								@endisset
								<div class="custom-file">
									<input type="file" class="custom-file-input form-control form-control-lg" name="image" id="imageFile" />
									<label class="custom-file-label form-control form-control-lg" for="imageFile">{{ __('Choose file') }}</label>
								</div>
							</div>
						</div>

						<div class="control-group">
							<div class="form-group mb-4">
								@if ($errors->has('portfolio_filter_id'))
								<div class="alert alert-danger" role="alert">{{ $errors->first('portfolio_filter_id') }}</div>
								@endif

								<select
									class="form-select form-control form-control-lg"
									aria-label="{{ __('Portfolio Filter select') }}"
									name="portfolio_filter_id">
									@foreach ($portfolioFilters as $portfolioFilter)
									<option
										value="{{ $portfolioFilter->id }}"
										{{
											old('portfolio_filter_id') == $portfolioFilter->id ?
											'selected="selected"' :
											(
												isset($portfolio->portfolio_filter_id) &&
												$portfolio->portfolio_filter_id == $portfolioFilter->id ?
												'selected=selected':
												''
											)
										}}
									>{{ $portfolioFilter->full_name }}</option>
									@endforeach
								</select>

							</div>
						</div>

						<div class="">
							<button class="btn btn-lg btn-primary py-3 mt-3 px-4 btn-pill" type="submit">Confirm</button>
						</div>
					</form>

				</div>

			</div>
		</div>
	</div>

</x-app-layout>