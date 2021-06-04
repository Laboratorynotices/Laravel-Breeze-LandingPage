<section class="wt-section bg-light" id="services">
	<div class="container"> 
		<div class="row justify-content-md-center text-center pb-lg-4 mb-lg-5 mb-4">
			<div class="col-md-8 text-center w-md-50 mx-auto mb-0 ">
			<h2 class="mb-md-2">Our Services</h2>
			<p class="lead text-muted">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
			</div>
		</div>
		<div class="row justify-content-center">

		@foreach ($services as $service)
			<div class="col-md-4">
				<div
					class="card mb-md-0 mb-3 border-1 rounded-md overflow-hidden b-hover"
					data-aos="fade-up"
					data-aos-easing="linear"
					data-aos-delay="{{ 1+2*$loop->index }}00">
					<a href="#"><img class="card-img-top" src="{{ asset('img/services/' . $service->image ) }}" alt="card image"></a>
					<div class="card-body py-4">
						<strong href="#" class="mb-2 d-block">{{ $service->sport }}</strong>
						<h5 class="mb-4 text-primary">{{ $service->description }}</h5>
						<div class="mb-4">
							<p>{{ $service->text }}</p>
						</div>
					</div> 
				</div>
			</div>
		@endforeach

		</div>
	</div>
</section>