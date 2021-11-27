<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			@isset($service->id)
			{{ __('Portfolio Filters Edit') }}
			@endisset
			@empty($service)
			{{ __('Portfolio Filters Create') }}
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
							isset($portfolioFilter->id) ?
								route('portfolio.filter.update', array('portfolioFilter' => $portfolioFilter->id)) :
								route('portfolio.filter.store')
						}}"
						method="post"
						enctype="multipart/form-data"
					>
						{{csrf_field()}}
						@isset($portfolioFilter->id)
						<input name="id" type="hidden" value="{{ $portfolioFilter->id }}" />
						@endisset


						<div class="control-group">
							<div class="form-group mb-4">
								@if ($errors->has('full_name'))
								<div class="alert alert-danger" role="alert">{{ $errors->first('full_name') }}</div>
								@endif
								<input type="text" class="form-control form-control-lg" 
									placeholder="Full Name"
									value="{{
										old('full_name') ?
										old('full_name') :
										$portfolioFilter->full_name ?? ''
									}}"
									id="full_name"
									required data-validation-required-message="Please enter Full Name"
									maxlength="100" data-validation-maxlength-message="Max 100 characters"
									name="full_name"
								/>
							</div>
						</div>

						<div class="control-group">
							<div class="form-group mb-4">
								@if ($errors->has('short_name'))
								<div class="alert alert-danger" role="alert">{{ $errors->first('short_name') }}</div>
								@endif
								<input type="text" class="form-control form-control-lg" 
									placeholder="Short Name"
									value="{{
										old('short_name') ?
										old('short_name') :
										$portfolioFilter->short_name ?? ''
									}}"
									id="short_name"
									required data-validation-required-message="Please enter Short Name"
									maxlength="100" data-validation-maxlength-message="Max 100 characters"
									name="short_name"
								/>
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