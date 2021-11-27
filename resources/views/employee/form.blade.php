<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			@isset($service->id)
			{{ __('Employees Edit') }}
			@endisset
			@empty($service)
			{{ __('Employees Create') }}
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
							isset($employee->id) ?
								route('employee.update', array('employee' => $employee->id)) :
								route('employee.store')
						}}"
						method="post"
						enctype="multipart/form-data"
					>
						{{csrf_field()}}
						@isset($employee->id)
						<input name="id" type="hidden" value="{{ $employee->id }}" />
						@endisset


						<div class="control-group">
							<div class="form-group mb-4">
								@if ($errors->has('name'))
								<div class="alert alert-danger" role="alert">{{ $errors->first('name') }}</div>
								@endif
								<input type="text" class="form-control form-control-lg" 
									placeholder="Name"
									value="{{
										old('name') ?
										old('name') :
										$employee->name ?? ''
									}}"
									id="name"
									required data-validation-required-message="Please enter name"
									maxlength="100" data-validation-maxlength-message="Max 100 characters"
									name="name"
								/>
							</div>
						</div>

						<div class="control-group">
							<div class="form-group mb-4">
								@if ($errors->has('image'))
								<div class="alert alert-danger" role="alert">{{ $errors->first('image') }}</div>
								@endif
								@isset($employee->image)
								<img src="/img/team/{{ $employee->image }}" width="250" />
								@endisset
								<div class="custom-file">
									<input type="file" class="custom-file-input form-control form-control-lg" name="image" id="imageFile" />
									<label class="custom-file-label form-control form-control-lg" for="imageFile">{{ __('Choose file') }}</label>
								</div>
							</div>
						</div>

						<div class="control-group">
							<div class="form-group mb-4">
								@if ($errors->has('position'))
								<div class="alert alert-danger" role="alert">{{ $errors->first('position') }}</div>
								@endif
								<input type="text" class="form-control form-control-lg" 
									placeholder="Position"
									value="{{
										old('position') ?
										old('position') :
										$employee->position ?? ''
									}}"
									id="position"
									required data-validation-required-message="Please enter position"
									maxlength="100" data-validation-maxlength-message="Max 100 characters"
									name="position"
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