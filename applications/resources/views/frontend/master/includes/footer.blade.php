<!-- start footer Area -->
<footer class="footer-area section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h6>Quote's</h6>
					<p>
						<i style="text-transform: capitalize"><b>“There is nothing more time-consuming than worries, and people who profess to believe
							in God should be ashamed when they are worried about something.”</b></i>
							<br>
						~MAHATMA GANDHI~
					</p>
				</div>
			</div>
			<div class="col-lg-2  col-md-6 col-sm-6">
				<div class="single-footer-widget">
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
				<div class="single-footer-widget">
					<h6>Follow Us</h6>
					<p>Let us be social</p>
					<div class="footer-social d-flex align-items-center">
						<?php
							$getMedsos = \App\Models\MasterMedsos::all();
						?>
						@foreach($getMedsos as $key)
								<a href="{{$key->link_sosmed}}" target="_blank">
									@if($key->nama_sosmed == 'facebook')
										<i class="fa fa-facebook"></i>
									@elseif($key->nama_sosmed == 'twitter')
										<i class="fa fa-twitter"></i>
									@elseif($key->nama_sosmed == 'youtube')
										<i class="fa fa-youtube"></i>
									@elseif($key->nama_sosmed == 'google-plus')
										<i class="fa fa-google-plus"></i>
									@elseif($key->nama_sosmed == 'linkedin')
										<i class="fa fa-linkedin"></i>
									@endif
								</a>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<p class="footer-text" style="text-align:center">www.jalinusantara.com |
					Sebuah Website Untuk Para Pecinta Offroad
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>
		</div>
	</div>
</footer>
<!-- End footer Area -->
