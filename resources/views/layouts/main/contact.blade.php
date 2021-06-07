<section class="wt-section bg-light" id="contact">
	<div class="container">
		<div class="row justify-content-md-center text-center pb-lg-4 mb-lg-5 mb-4">
			<div class="col-md-8 text-center w-md-50 mx-auto mb-0 ">
				<h2 class="mb-md-2">Let us know</h2>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
			</div>
		</div>
		<div class="row justify-content-md-center text-center mg-5 pb-5">
			<div class="col-md-8">

			@isset($status)
				@include('layouts.main.contactData')
			@endisset

			@empty($status)
				@include('layouts.main.contactForm')
			@endempty

			</div>
		</div>
		<div class="row">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11880.492291371422!2d12.4922309!3d41.8902102!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x28f1c82e908503c4!2sColosseo!5e0!3m2!1sit!2sit!4v1524815927977" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</section>