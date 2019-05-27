@extends('frontend.master.layouts.master')

<style>
.about-banner{background:url({{url('images/slider')}}/{{$getSlider[0]->url_slider}}) center;background-size:cover;background-attachment:fixed}
  @media (max-width: 767.98px){.banner-area .fullscreen{height:700px !important}}
</style>

@section('banner')
<!-- start banner Area -->
  <section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
      <div class="row d-flex align-items-center justify-content-center">
        <div class="about-content col-lg-12">
          <h1 class="text-white">
            {{$getInformasi[0]->nama_kategori}}
          </h1>
          <p class="text-white link-nav"><a href="{{ route('home') }}">Home </a>
            <span class="lnr lnr-arrow-right"></span>  <a href="{{$getInformasi[0]->id}}"> {{$getInformasi[0]->nama_kategori}}</a></p>
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
					{{$getInformasi[0]->judul_informasi}}
				</h1>
				<p>
					<?php echo $getInformasi[0]->isi_informasi ?>
				</p>
			</div>
		</div>
	</div>
	<img class="about-img" src="{{asset('themeuser/img/about-img.png')}}" alt="">
</section>
<!-- End home-about Area -->

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
            <div class="title justify-content-start d-flex">
              <a href="{{$key->link_sponsor}}"><h4>{{$key->nama_sponsor}}</h4></a>
              <div class="star">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
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

@endsection

@section('footscript')

@endsection
