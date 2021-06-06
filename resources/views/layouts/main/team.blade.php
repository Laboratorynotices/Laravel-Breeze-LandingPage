<section class="bg-light wt-section" id="team">
	<div class="container"> 
		<div class="row justify-content-md-center text-center mb-lg-5 mb-4 pb-lg-5">
			<div class="col-md-12">
				<h2 class="h1">Our Team</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, </p>
			</div>
		</div>

		<div class="row">

			@foreach ($employees as $employee)
			<div class="col-lg-3 col-sm-6 mb-5"> 
				<figure data-aos="fade-up" data-aos-easing="linear" data-aos-delay="{{ 1 + $loop->index }}00">
					<img class="w-100 rounded-top" src="{{ asset('img/team/img' . $employee->image) }}" alt="Image Description"> 
					<div class="wt-box-shadow-sm bg-white text-center rounded p-4">
						<div class="mb-3">
							<h5 class="mb-1">{{ $employee->name }}</h5>
							<small class="d-block font-style-normal text-uppercase text-primary wt-letter-spacing-xs">{{ $employee->position }}</small>
						</div>
					</div> 
				</figure> 
			</div>
			@endforeach

	</div>
</section>