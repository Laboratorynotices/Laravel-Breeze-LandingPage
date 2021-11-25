<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			@isset($exercise->id)
			{{ __('Exercises Edit') }}
			@endisset
			@empty($records)
			{{ __('Exercises Create') }}
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
							isset($exercise->id) ?
								route('exercise.update', array('exercise' => $exercise->id)) :
								route('exercise.store')
							 
						}}"
						method="post"
						enctype="multipart/form-data"
					>
						{{csrf_field()}}
						@isset($exercise->id)
						<input name="id" type="hidden" value="{{ $exercise->id }}" />
						@endisset


						<div class="control-group">
							<div class="form-group mb-4">
								@if ($errors->has('class'))
								<div class="alert alert-danger" role="alert">{{ $errors->first('class') }}</div>
								@endif
								<input type="text" class="form-control form-control-lg" 
									placeholder="Class"
									value="{{
										old('class') ?
										old('class') :
										$exercise->class ?? ''
									}}"
									id="class"
									required data-validation-required-message="Please enter class"
									maxlength="100" data-validation-maxlength-message="Max 100 characters"
									name="class"
								/>
							</div>
						</div>

						<div class="control-group">
							<div class="form-group mb-4">
								@if ($errors->has('time'))
								<div class="alert alert-danger" role="alert">{{ $errors->first('time') }}</div>
								@endif
								<input type="text" class="form-control form-control-lg" 
									placeholder="Time"
									value="{{
										old('time') ?
										old('time') :
										$exercise->time ?? ''
									}}"
									id="time"
									required data-validation-required-message="Please enter time"
									maxlength="50" data-validation-maxlength-message="Max 50 characters"
									name="time"
								/>
							</div>
						</div>

						<div class="control-group">
							<div class="form-group mb-4">
								@if ($errors->has('description'))
								<div class="alert alert-danger" role="alert">{{ $errors->first('description') }}</div>
								@endif
								<input type="text" class="form-control form-control-lg" 
									placeholder="Description"
									value="{{
										old('description') ?
										old('description') :
										$exercise->description ?? ''
									}}"
									id="description"
									required data-validation-required-message="Please enter description"
									maxlength="50" data-validation-maxlength-message="Max 50 characters"
									name="description"
								/>
							</div>
						</div>

						<div class="control-group">
							<div class="form-group mb-4">
								@if ($errors->has('price'))
								<div class="alert alert-danger" role="alert">{{ $errors->first('price') }}</div>
								@endif
								<input type="text" class="form-control form-control-lg" 
									placeholder="Price"
									value="{{
										old('price') ?
										old('price') :
										$exercise->price ?? ''
									}}"
									id="price"
									required data-validation-required-message="Please enter price"
									maxlength="50" data-validation-maxlength-message="Max 50 characters"
									name="price"
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