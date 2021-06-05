@switch($portfolio->filter)
	@case("Graphic")
		gts
		@break
	@case("UI Project")
		lap
		@break
	@default
		selfie
@endswitch
