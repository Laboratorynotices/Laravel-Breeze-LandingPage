<div class="wt-section" id="price">
	<div class="container">
		<div class="row justify-content-md-center text-center mb-lg-5 mb-4 pb-lg-5">
			<div class="col-md-12">
				<h2 class="h1">Price & Schedule</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, </p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table custom-table table-borderless">
						<thead>
						<tr>
							<th>Time</th>
							<th>Class</th>
							<th>Price</th>
							<th>Join Now</th>
						</tr>
						</thead>
						<tbody>

						@foreach ($exercises as $exercise)
						<tr data-aos="fade-in" data-aos-easing="linear" data-aos-delay="200">
							<td>{{ $exercise->time }}</td>
							<td>
								<h6>{{ $exercise->class }}</h6>
								<span class="text-muted">{{ $exercise->description }}</span>
							</td>
							<td>
								<h6>{{ $exercise->price }}</h6>
								<span class="text-muted">Monthly</span>
							</td>
							<td>
								<a href="#" class="btn btn-primary btn-pill">Join Now</a>
							</td>
						</tr>
						@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>