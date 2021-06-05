<section class="wt-section" id="portfolio"> 
	<div class="container">
		<div class="row justify-content-md-center text-center pb-lg-5">
			<div class="col-md-12">
				<h2 class="h1">Portfolio</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, </p>
			</div>
		</div>
		<div class="portfolio-menu mt-2 mb-4 pb-3">
			<ul>
				<li class="btn btn-pill mr-2 btn-outline-dark active" data-filter="*">All</li>
				<li class="btn btn-pill mr-2 btn-outline-dark" data-filter=".gts">Graphic</li>
				<li class="btn btn-pill mr-2 btn-outline-dark" data-filter=".lap">UI Project</li>
				<li class="btn btn-pill btn-outline-dark text" data-filter=".selfie">Fullstack</li>
			</ul>
		</div>

		<div class="portfolio-item row" data-aos="fade-up" data-aos-easing="linear" data-aos-delay="100">

		@foreach ($portfolios as $portfolio)
			<div class="item @include('layouts.main.portfolioClass') col-lg-3 col-md-4 col-6 col-sm">
				<div class="hovereffect rounded-md overflow-hidden">
					<img class="img-fluid img-responsive" src="{{ asset('img/portfolio/' . $portfolio->image) }}" alt="">
					<div class="overlay">
						<p>
							<a href="{{ asset('img/portfolio/' . $portfolio->image) }}" class="fancylight popup-btn info" data-fancybox-group="light">My Profile
							<i>view</i></a>
						</p>
					</div>
				</div>
			</div>
		@endforeach

		</div>
	</div>
</section>