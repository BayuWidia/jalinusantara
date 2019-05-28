@extends('frontend.master.layouts.master')

<style>
.banner-area{background:url({{url('images/slider')}}/{{$getSlider[0]->url_slider}}) center;background-size:cover;background-attachment:fixed}
  @media (max-width: 767.98px){.banner-area .fullscreen{height:700px !important}}
</style>
@section('banner')
<!-- start banner Area -->
  <section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
      <div class="row fullscreen d-flex justify-content-center align-items-center">
        <div class="banner-content col-lg-10 col-md-12 justify-content-center">
          <h6 class="text-uppercase">Whenever we drive, drive with our heart</h6>
          <h1>
            {{$getSlider[0]->judul}}
          </h1>
          <p class="text-white mx-auto">
            {{$getSlider[0]->keterangan_slider}}.
          </p>
        </div>
      </div>
    </div>
  </section>
<!-- End banner Area -->
@endsection


@section('content')
<!-- Start home-about Area -->
<section class="home-about-area section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<h1 class="text-uppercase">
          {{$getDataSejarah[0]->judul_informasi}}
				</h1>
				<p>
          <?php $isiInformasi = explode(" ", $getDataSejarah[0]->isi_informasi); ?>
          @if(count($isiInformasi)<=85)
            <span><?php echo $getDataSejarah[0]->isi_informasi ?></span>
          @else
            @for($i=0; $i < 85; $i++)
              <span><?php echo $isiInformasi[$i] ?></span>
            @endfor
            [.....]
          @endif

				</p>
				<a class="primary-btn squire" href="{{ route('about.us', $getDataSejarah[0]->id) }}">
          Selengkapnya&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="lnr lnr-pointer-right"></span></a>
			</div>
		</div>
	</div>
	<img class="about-img" src="{{asset('themeuser/img/about-img.png')}}" alt="">
</section>
<!-- End home-about Area -->

<!-- Start item-category Area -->
<section class="item-category-area section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-12 pb-80 header-text text-center">
				<h1 class="pb-10">Event's Today</h1>
        @if($getDataEvents == null)
         <br>
          <p style="text-align:center">
            <alert class="alert alert-success">
              “Mohon maaf untuk hari ini belum ada event's yang lakukan...”
            </alert>
          </p>
        @endif
			</div>
		</div>
		<div class="row">
      @if($getDataEvents != null)
        @foreach($getDataEvents as $key)
          <div class="col-lg-3 col-md-6">
            <div class="single-cat-item">
              <div class="thumb">
                <img class="img-fluid" src="{{url('images/events')}}/{{$key->url_foto}}" alt="">
              </div>
              <a href="{{url('eventsById')}}/{{$key->id}}/{{$key->id_kategori}}"><h4>{{$key->judul_event}}</h4></a>
              <p>
                <?php $isiEvents = explode(" ", $key->isi_event); ?>
                @if(count($isiEvents)<=10)
                  <span><?php echo $key->isi_event ?></span>
                @else
                  @for($i=0; $i < 10; $i++)
                    <span><?php echo $isiEvents[$i] ?></span>
                  @endfor
                  [.....]
                @endif
              </p>
                <a class="genric-btn info" href="{{url('eventsById')}}/{{$key->id}}/{{$key->id_kategori}}">
                  Lihat Selengkapnya&nbsp;&nbsp;&nbsp;&nbsp;<span class="lnr lnr-pointer-right"></span></a>
            </div>
          </div>
        @endforeach
      @endif
		</div>
	</div>
</section>
<!-- End item-category Area -->

<!-- Start about-video Area -->
<section class="about-video-area section-gap">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 about-video-left">
				<h1>
					{{$getDataVideo[0]->judul}}
				</h1>
				<h6 class="text-uppercase">{{$getDataVideo[0]->url_video}}[.....]</h6>
				<a class="primary-btn" href="{{ route('galeri') }}">Lihat Selengkapnya</a>
			</div>
			<div class="col-lg-6 about-video-right justify-content-center align-items-center d-flex">
				<a class="play-btn" href="{{$getDataVideo[0]->url_video}}">
          <img class="img-fluid mx-auto" src="{{asset('themeuser/img/play.png')}}" alt=""></a>
			</div>
		</div>
	</div>
</section>
<!-- End about-video Area -->

<!-- Start review Area -->
<section class="review-area section-gap relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-9 pb-40 header-text text-center">
				<h1 class="pb-10 text-white">Enjoy our Sponsor's</h1>
			</div>
		</div>
		<div class="row">
			<div class="active-review-carusel">
        @foreach($getSponsor as $key)
          <div class="single-review item">
            <img src="{{url('images/sponsor')}}/{{$key->url_sponsor}}" alt="">
            <!-- <img src="{{asset('themeuser/img/logo.png')}}" alt="" title="" height="150px" width="150px"/> -->
            <div class="title justify-content-start d-flex">
              <a href="{{$key->link_sponsor}}"><h4>{{$key->nama_sponsor}}</h4></a>
              <div class="star">
                @for($i=0; $i < $key->rekomendasi; $i++)
                <span class="fa fa-star checked"></span>
                @endfor
              </div>
            </div>
            <p>
              {{$key->keterangan_sponsor}}
            </p>
          </div>
        @endforeach
			</div>
		</div>
	</div>
</section>
<!-- End review Area -->

<!-- Start blog Area -->
<section class="blog-area section-gap" id="blog">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-9 pb-30 header-text">
				<h1>Article's Feed</h1>
			</div>
		</div>
		<div class="row">
      @foreach($getDataArticle as $key)
  			<div class="single-blog col-lg-4 col-md-4">
  				<div class="thumb">
            <img src="{{ url('images/article/') }}/{{$key->url_foto}}" class="f-img img-fluid mx-auto">
  				</div>
  				<div class="bottom d-flex justify-content-between align-items-center flex-wrap">
  					<div>
              @if($key->url_foto=="")
                <img src="{{asset('images/user/default.png')}}" class="img-fluid" width="30" height="30">
              @else
                <img src="{{ url('images/user/') }}/{{$key->url_foto2}}" class="img-fluid" width="30" height="30">
              @endif
  						<span>{{$key->name}}</span>
  					</div>
  					<div class="meta">
              <?php $date = explode(' ', $key->created_at) ?>
  						<span class="lnr lnr-calendar-full"></span> {{ \Carbon\Carbon::parse($key->created_at)->format('d-M-y')}}
  						<span class="lnr lnr-clock"></span> {{$date[1]}}
              <span class="lnr lnr-eye"></span> {{$key->view_counter}}
  					</div>
  				</div>
  				<a href="{{url('articleById')}}/{{$key->id}}/{{$key->id_kategori}}">
  					<h4>{{$key->judul_informasi}}</h4>
  				</a>
  				<p>
              <?php $isiArticle = explode(" ", $key->isi_informasi); ?>
              @if(count($isiArticle)<=15)
                <span><?php echo $key->isi_informasi ?></span>
              @else
                @for($i=0; $i < 15; $i++)
                  <span><?php echo $isiArticle[$i] ?></span>
                @endfor
                [.....]
              @endif
  				</p>
          <a class="genric-btn info" href="{{url('articleById')}}/{{$key->id}}/{{$key->id_kategori}}">
            Lihat Selengkapnya&nbsp;&nbsp;&nbsp;&nbsp;<span class="lnr lnr-pointer-right"></span></a>
  			</div>
      @endforeach
		</div>
	</div>
</section>
<!-- end blog Area -->

@endsection

@section('footscript')

@endsection
