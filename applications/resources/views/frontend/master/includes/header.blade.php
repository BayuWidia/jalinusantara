<!-- start header Area -->
<header id="header" id="home">
	<div class="header-top">
		<div class="container">
  		<div class="row align-items-center">
  			<div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
	      	<div class="menu-social-icons">
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
  			<div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
				<a class="btns" href="tel:+953 012 3654 896">+62 812 8778 7266</a>
  				<a class="btns" href="#">sandi@jalinnusantara.com</a>
  				<a class="icons" href="tel:+953 012 3654 896">
  					<span class="lnr lnr-phone-handset"></span>
  				</a>
  				<a class="icons" href="#">
  					<span class="lnr lnr-envelope"></span>
  				</a>
  			</div>
  		</div>
		</div>
  </div>
  <div class="container main-menu">
  	<div class="row align-items-center justify-content-between d-flex">
  		<a href="index.html"><img src="{{asset('themeuser/img/logo.png')}}" alt="" title="" /></a>
		<nav id="nav-menu-container">
			<ul class="nav-menu">
			  <li class="menu-active"><a href="{{ route('home') }}">Home</a></li>
				<?php
					$getMenuAbout = \App\Models\Informasi::join('master_kategori', 'informasi.id_kategori', '=', 'master_kategori.id')
						->select(DB::raw('distinct(master_kategori.nama_kategori)'), 'informasi.id')
						->where('informasi.flag_status', '=', 'profile')->where('informasi.activated', '=', '1')->get();

					$getMenuArticle = \App\Models\Informasi::join('master_kategori', 'informasi.id_kategori', '=', 'master_kategori.id')
						->select(DB::raw('distinct(master_kategori.nama_kategori)'), 'master_kategori.id')
						->where('informasi.flag_status', '=', 'article')->where('informasi.activated', '=', '1')->get();

					$getMenuEvents = \App\Models\Events::join('master_kategori', 'events.id_kategori', '=', 'master_kategori.id')
						->select(DB::raw('distinct(master_kategori.nama_kategori)'), 'master_kategori.id')
						->where('master_kategori.activated', '=', '1')->get();

					$getMenuGallery = \App\Models\Events::select('events.*')
						->where('events.flag_publish', '=', '1')->get();
				?>
			  <li class="menu-has-children"><a href="#">About Us</a>
						<ul>
							@foreach($getMenuAbout as $key)
				      	<li><a href="{{ route('about.us', $key->id) }}">{{$key->nama_kategori}}</a></li>
							@endforeach
				    </ul>
				</li>

				<li class="menu-has-children"><a href="#">Event's</a>
						<ul>
							@foreach($getMenuEvents as $key)
				      	<li><a href="{{ route('events', $key->id) }}">{{$key->nama_kategori}}</a></li>
							@endforeach
				    </ul>
				</li>

				<li class="menu-has-children"><a href="#">Article</a>
						<ul>
							@foreach($getMenuArticle as $key)
				      	<li><a href="{{ route('article', $key->id) }}">{{$key->nama_kategori}}</a></li>
							@endforeach
				    </ul>
				</li>

				<li class="menu-has-children"><a href="#">Gallery</a>
						<ul>
							@foreach($getMenuGallery as $key)
				      	<li><a href="{{ route('galeri.video', $key->id) }}">{{$key->judul_event}}</a></li>
							@endforeach
				    </ul>
				</li>

				<li><a href="{{ route('contact') }}">Contact</a></li>
			</ul>
		</nav><!-- #nav-menu-container -->
  	</div>
  </div>
</header><!-- #header -->
<!-- end header Area -->
