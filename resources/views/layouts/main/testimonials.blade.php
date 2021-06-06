<section class="wt-section">
	<div class="container">
		<div class="row justify-content-md-center text-center pb-lg-4 mb-lg-5 mb-4">
			<div class="col-md-8 text-center w-md-50 mx-auto mb-0 ">
				<h2 class="mb-md-2">Testimonials</h2>
				<p>Maxi creative technology company providing key digital services for everyone.</p>
			</div>
		</div>

		<div class="row">

			@foreach ($testimonials as $testimonial)
			<div
				class="col-lg-6 mb-7 mb-lg-0 px-lg-5"
				data-aos="{{ $loop->odd ? 'fade-right' : 'fade-left' }}"
				data-aos-easing="linear"
				data-aos-delay="{{ 2+2*$loop->index }}00"
			>
				<!-- Testimonial -->
				<blockquote class="wt-blockquote-v2 rounded mb-5">{{ $testimonial->text }}</blockquote>
				<div class="media wt-font-size-90">
				<img
					class="d-flex align-self-center rounded-circle wt-blockquote-v2__image wt-box-shadow-lg mx-3 mt-2"
					src="{{ asset('img/ava/' . $testimonial->image ) }}"
					alt="Image description"
				/>
				<div class="media-body align-self-center">
					<strong class="d-block">{{ $testimonial->name }}</strong>
					<span class="wt-font-size-75 text-dark">{{ $testimonial->position }}</span>
				</div>
				</div>
				<!-- End Testimonial -->
			</div>
			@endforeach

		</div>
	</div>
</section>