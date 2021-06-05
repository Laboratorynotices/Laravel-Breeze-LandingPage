<section class="wt-section bg-primary">
	<div class="container">
		<div class="row justify-content-md-center text-center pb-lg-4 mb-lg-5 mb-4">
			<div class="col-md-8 text-center w-md-50 mx-auto mb-0 ">
				<h2 class="mb-md-2">Amenities</h2>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
			</div>
		</div>

		<!-- Feature Blocks -->
		<div class="row">

			@foreach ($amenities as $amenity)
			<div class="col-md-4">
				<div
					class="bg-white p-5 mb-4 text-center rounded-md overflow-hidden b-hover"
					data-aos="fade-up"
					data-aos-easing="linear"
					data-aos-delay="{{ 1+2*$loop->index }}00"
				>
					<i class="{{ $amenity->icon }} display-4 d-block text-primary mb-4"></i>
					<h6 class="my-2">{{ $amenity->title }}</h6>
					<p class="text-muted">{{ $amenity->description }}</p> 
				</div>
			</div>
			@endforeach

		</div>
		<!-- End Feature Blocks -->	
	</div>
</section>