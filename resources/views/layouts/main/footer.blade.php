<!-- Footer -->
<footer class="bg-dark py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-8 text-center text-md-left mb-3 mb-md-0">
				<small class="text-white"><a class="text-white" href="https://webthemez.com/free-bootstrap-templates/">Bootstrap Theme</a> by WebThemez. <br/>&copy; All Rights Reserved</small>
			</div>

			<div class="col-md-4 align-self-center">
				<ul class="list-inline text-center text-md-right mb-0">
					<li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Facebook">
					<a class="text-white" target="_blank" href="https://www.facebook.com/Maxi">
						<i class="fab fa-facebook"></i>
					</a>
					</li>
					<li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Instagram">
					<a class="text-white" target="_blank" href="https://www.instagram.com/Maxi">
						<i class="fab fa-instagram"></i>
					</a>
					</li>
					<li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Twitter">
					<a class="text-white" target="_blank" href="https://twitter.com/Maxi">
						<i class="fab fa-twitter"></i>
					</a>
					</li>
					<li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Dribbble">
					<a class="text-white" target="_blank" href="https://dribbble.com/Maxi">
						<i class="fab fa-dribbble"></i>
					</a>
					</li>
					
					@if (Route::has('login'))
						@auth
					<li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Dashboard">
						<a class="text-white" target="_blank" href="{{ url('/dashboard') }}">
							<i class="fab fa-fort-awesome"></i>
						</a>
					</li>
						@else
					<li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Log in">
						<a class="text-white" target="_blank" href="{{ route('login') }}">
							<i class="fas fa-sign-in-alt"></i>
						</a>
					</li>
						@endauth
					@endif
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- End Footer -->