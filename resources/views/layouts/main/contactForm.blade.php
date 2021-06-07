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
		action="{{ route('home') }}#contact"
		method="post"
	>
		<div class="control-group">
			<div class="form-group mb-4">
				@if ($errors->has('name'))
				<div class="alert alert-danger" role="alert">{{ $errors->first('name') }}</div>
				@endif
				<input type="text" class="form-control form-control-lg" 
					placeholder="Full Name"
					@isset($name) value="{{ $name }}" @endisset
					id="name" required name="name"
					data-validation-required-message="Please enter your name" />
			</div>
		</div>
		<div class="form-group mb-4">
			<div class="controls">
				@if ($errors->has('email'))
				<div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
				@endif
				<input type="email" class="form-control form-control-lg"
					placeholder="Email"
					@isset($email) value="{{ $email }}" @endisset
					id="email" required name="email"
					data-validation-required-message="Please enter your email" />
			</div>
		</div>
		<div class="form-group mb-4">
			<div class="controls">
				@if ($errors->has('message'))
				<div class="alert alert-danger" role="alert">{{ $errors->first('message') }}</div>
				@endif
				<textarea rows="10" cols="100" class="form-control form-control-lg"
					placeholder="Message" id="message" required name="message"
					data-validation-required-message="Please enter your message" minlength="5"
					data-validation-minlength-message="Min 5 characters"
					maxlength="999" style="resize:none">@isset($message) {{ $message }} @endisset</textarea>
			</div>
		</div>
		<!-- div id="success"></div> <!-- For success/fail messages -->
		{{csrf_field()}}
		<div class="text-center">
			<button class="btn btn-lg btn-primary py-3 mt-3 px-4 btn-pill" type="submit">Send Your Message</button>
		</div>
	</form>

</div>