<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			@isset($amenity->id)
			{{ __('Amenities Edit') }}
			@endisset
			@empty($records)
			{{ __('Amenities Create') }}
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
							isset($amenity->id) ?
								route('amenity.update', array('amenity' => $amenity->id)) :
								route('amenity.store')
							 
						}}"
						method="post"
						enctype="multipart/form-data"
					>
						{{csrf_field()}}
						@isset($amenity->id)
						<input name="id" type="hidden" value="{{ $amenity->id }}" />
						@endisset


						<div class="control-group">
							<div class="form-group mb-4">
								@if ($errors->has('title'))
								<div class="alert alert-danger" role="alert">{{ $errors->first('title') }}</div>
								@endif
								<input type="text" class="form-control form-control-lg" 
									placeholder="Title"
									value="{{
										old('title') ?
										old('title') :
										$amenity->title ?? ''
									}}"
									id="title"
									required data-validation-required-message="Please enter title"
									maxlength="50" data-validation-maxlength-message="Max 50 characters"
									name="title"
								/>
							</div>
						</div>

						<div class="control-group">
							<div class="form-group mb-4">
								@if ($errors->has('icon'))
								<div class="alert alert-danger" role="alert">{{ $errors->first('icon') }}</div>
								@endif
								<div class="row">
									<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
										<i class="{{
												old('icon') ?
												old('icon') :
												$amenity->icon ?? 'ti-layout-sidebar-none'
											}} display-4 d-block text-primary"></i>
									</div>
									<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
										<input type="text" class="form-control form-control-lg" 
											placeholder="Icon"
											value="{{
												old('icon') ?
												old('icon') :
												$amenity->icon ?? ''
											}}"
											id="icon"
											required data-validation-required-message="Please enter Icon"
											maxlength="50" data-validation-maxlength-message="Max 50 characters"
											name="icon"
										/>
									</div>
									<div class="col-12 col-sm-12 col-md-4 col-lg-6 col-xl-8">
										<a href="https://themify.me/themify-icons" target="_blank">
											List of the Themify Icons on themify.me 
										</a>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group mb-4">
							<div class="controls">
								@if ($errors->has('description'))
								<div class="alert alert-danger" role="alert">{{ $errors->first('description') }}</div>
								@endif
								<textarea rows="10" cols="100" class="form-control form-control-lg"
									placeholder="Description" id="description" required name="description"
									data-validation-required-message="Please enter your description" minlength="10"
									data-validation-minlength-message="Min 10 characters"
									maxlength="999" style="resize:none">{{
												old('description') ?
												old('description') :
												$amenity->description ?? ''
											}}</textarea>
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