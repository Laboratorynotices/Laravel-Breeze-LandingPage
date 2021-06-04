<section class="wt-section">
	<div class="container">
		<div class="row justify-content-between align-items-center" data-aos="fade-left" data-aos-easing="linear" data-aos-delay="200">
			<div class="col-md-7"> 
				<h2 class="mb-4">{{ $data->title }}</h2>
				<p class="text-muted">{{ $data->text }}</p>
			</div>
			<div class="col-md-5">
				 <img src="{{ asset('img/about/'.$data->image) }}" width="90%" class="rounded-md" alt="">
			</div>
		</div>
	</div>
</section>