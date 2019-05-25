<!-- start header Area -->
<header id="header" id="home">
	<div class="header-top">
		<div class="container">
  		<div class="row align-items-center">
  			<div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
	      	<div class="menu-social-icons">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-behance"></i></a>
			</div>
  			</div>
  			<div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
				<a class="btns" href="tel:+953 012 3654 896">+953 012 3654 896</a>
  				<a class="btns" href="mailto:support@colorlib.com">support@colorlib.com</a>
  				<a class="icons" href="tel:+953 012 3654 896">
  					<span class="lnr lnr-phone-handset"></span>
  				</a>
  				<a class="icons" href="mailto:support@colorlib.com">
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
						->where('events.activated', '=', '1')->get();
				?>
			  <li class="menu-has-children"><a href="#">About</a>
						<ul>
							@foreach($getMenuAbout as $key)
				      	<li><a href="{{ route('about.us', $key->id) }}">{{$key->nama_kategori}}</a></li>
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
				<li class="menu-has-children"><a href="#">Events</a>
						<ul>
							@foreach($getMenuEvents as $key)
				      	<li><a href="{{ route('events', $key->id) }}">{{$key->nama_kategori}}</a></li>
							@endforeach
				    </ul>
				</li>

			  <li><a href="{{ route('galeri') }}">Galeri</a></li>
				<li><a href="{{ route('contact') }}">Contact</a></li>
			</ul>
		</nav><!-- #nav-menu-container -->
  	</div>
  </div>
</header><!-- #header -->
<!-- end header Area -->
